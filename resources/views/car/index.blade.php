@extends('layouts.app')


@section('content')
    <div class="content" id="carList" xmlns:v-bind="http://www.w3.org/1999/xhtml"
         xmlns:v-on="http://www.w3.org/1999/xhtml">
        <h1> Cars Example </h1>



        <ul>
            <li v-for="car in cars"> @{{ car.carName }} </li>
        </ul>

        <input type="text" id="carName" v-model="inputCarName">
        <button v-on:click="addCar" v-bind:title="popup">Add car</button>
        <button v-bind:disabled="active" >disabled button</button>

        <br>
        <h1>All tasks</h1>
        <ul>
            <li v-for="task in tasks">
                <input type="checkbox" v-model="task.completed">
                @{{ task.description }}
            </li>

        </ul>

        <h1>Completed task</h1>
        <ul>
            <li v-for="task in completedTasks" v-text="task.description">

            </li>
        </ul>

        <h2>Not completed </h2>

        <ul>
            <li v-for="task in notCompletedTasks">
                <input type="text" v-model="task.description">
            </li>
        </ul>
    </div>

    <div id="root">
        <task-list></task-list>

    </div>

@endsection

@section('vuecomponent')
    <script>
        Vue.component('task-list', {
            template: '<div><task v-for="task in tasks"> @{{ task.task }} </task></div>',

            data: function() {
                return {
                    tasks: [    {task: 'go to home', completed: true},
                        {task: 'go to bank', completed: true},
                        {task: 'go to yard', completed: false},
                        {task: 'go to school', completed: false},
                    ]
                }

            }
        });

        Vue.component('task', {
            template: '<li><slot></slot></li>'
        });

        new Vue({
            el: '#root'
        });

    </script>
@endsection