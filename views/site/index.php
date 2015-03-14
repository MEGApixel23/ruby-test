<?php

/**
 * @var $projects \app\models\Project[]
 * @var $this yii\web\View
 */

use \yii\helpers\Html;
use \yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div ng-controller="Projects">
    <div class="row" ng-repeat="project in projects">
        <div data-class="project"
             class="project col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3"
             data-id="{{projectId}}">
            <div class="project-header bg-primary">
                <div class="glyphicon glyphicon-list-alt project-icon"></div>
                <div class="project-title">{{project.title}}</div>
                <div class="project-controls pull-right">
                    <a href="#">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a> |
                    <a href="#"
                       ng-click="delete(project)"
                       onclick="return false;"
                       class="delete-project">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>
            </div>
            <div class="project-creator">
                <div class="add-task">
                    <a href="#">
                        <span class="glyphicon glyphicon-plus add-task-icon"></span>
                    </a>
                </div>
                <div class="task-input">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control"
                               ng-model="project.newTaskText">
                        <span class="input-group-btn">
                            <button class="btn btn-success"
                                    ng-click="addTask(project)"
                                    type="button">
                                Add Task
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="tasks">
                <div class="fields"></div>
                <table class="tasks-table table">
                    <tr class="task" ng-repeat="task in project.tasks">
                        <td class="checkbox-container">
                            <input type="checkbox">
                        </td>
                        <td>
                            {{task.text}}
                        </td>
                        <td class="task-controls">
                            <a href="#">
                                    <span class="glyphicon
                                     glyphicon-resize-vertical"></span>
                            </a> |
                            <a href="#">
                                    <span class="glyphicon
                                    glyphicon-pencil"></span>
                            </a> |
                            <a href="#">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="add-project-container">
            <button ng-click="add()" data-url="<?=Url::to(['/project'])?>" class="add-project btn btn-primary">Add TODO list</button>
        </div>
    </div>
</div>

<? $this->registerJsFile('/js/app/app.js')?>