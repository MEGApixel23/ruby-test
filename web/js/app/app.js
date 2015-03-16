function Projects($scope, $http) {
    $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

    $http.get('/project?expand=tasks')
        .success(function(data, status, headers, config) {
            $scope.projects = data;
        });

    $scope.add = function() {
        $http.post('/project?expand=tasks', $.param({title: 'new'}))
            .success(function(data, status, headers, config) {
                $scope.projects.push(data);
            });
    };

    $scope.delete = function(project) {
        $http.delete('/project/' + project.id)
            .success(function(data, status, headers, config) {
                var index = $scope.projects.indexOf(project);

                $scope.projects.splice(index, 1);
            });
    };

    $scope.addTask = function(project) {
        $http.post('/task', $.param({
            project_id: project.id,
            text: project.newTaskText
        })).success(function(data, status, headers, config) {
            if (!project.hasOwnProperty('tasks'))
                project.tasks = [];

            project.tasks.push(data);
        });

        project.newTaskText = null;
    };
}