@extends('layouts.app')


@section('content')
    <div id="root" class="container">

        <div class="tabs">
            <ul>
                <li class="is-active"><a>Pictures</a></li>
                <li><a>Music</a></li>
                <li><a>Videos</a></li>
                <li><a>Documents</a></li>
            </ul>
        </div>

        <tabs>
            <tab name="Name" :selected="true">
                <h1>this is the content of Name tab</h1>
            </tab>
            <tab name="Foo">
                <h1>This is the contenct of foo tab</h1>
            </tab>
            <tab name="Boo">
                <h1>This is the cintenct of boo tab</h1>
            </tab>
            <tab name="Goo">
                <h1>this is content of goo tab</h1>
            </tab>
        </tabs>


        <message title="hello title" body="Lorev ipsum dolor sit"></message>

        <modal v-show="showModal" v-on:close="showModal = false"></modal>

        <button v-on:click="showModal = true">Show modal</button>
    </div>

@endsection

@section('vuecomponent')
    <script >

        Vue.component('tabs', {
            template:
                    '<div>' +
                        '<div class="tabs">' +
                            '<ul>' +
                                '<li v-for="tab in tabs" :class="{\'is-active\' : tab.isActive}"> ' +
                                    '<a :href="tab.href" @click="selectTab(tab)">' +
                                        '@{{ tab.name }}'+
                                    '</a></li>' +
                            '</ul>' +
                        '</div>' +

                        '<div class="tabs-details">' +
                            '<slot></slot>' +
                        '</div>' +
                    '</div>',


            data: function() {
                return {
                    tabs: []
                }
            },

            created() {
                this.tabs = this.$children;
            },

            methods: {
                selectTab: function(selectedTab) {
                    this.tabs.forEach(tab => {
                        tab.isActive = (selectedTab.name == tab.name)
                    });
                }
            }

        });

        Vue.component('tab', {
            props: {
                name: {required: true},
                selected: { default: false}
            },
            template: '<div v-show="isActive"> <slot> @{{name}} </slot> </div>',

            data: function() {
                return {
                    isActive: false
                }
            },

            computed: {
                href() {
                    return '#' + this.name.toLowerCase().replace(/ /g, '-');
                }
            },

            mounted() {
                this.isActive = this.selected
            }
        });

        Vue.component('modal', {

            template: '<div class="modal is-active" >' +
                            '<div class="modal-background"></div>'+
                            '<div class="modal-content">'+
                                '<div class="box">'+
                                    '<p>Lorem ipsum text </p>'+
                                '</div>'+
                            '</div>'+
                            '<button class="modal-close" v-on:click="$emit(\'close\')" ></button>'+
                        '</div>',




        });


        Vue.component('message', {

            data: function() {
                return {
                    isVisiable: true
                }
            } ,
            props: ['title', 'body'],
            template: '' +
            '<article class="message" v-show="isVisiable"> ' +
                '<div class="message-header">' +
                    '<p> @{{ title }} </p>' +
                    '<button class="delete" v-on:click="isVisiable = false"></button>' +
                '</div>' +
                '<div class="message-body">' +
                    '@{{ body }}' +
                '</div>' +
            '</article>',

            methods: {
                hideMessage: function() {
                    this.isVisiable = false;
                }
            }



        });


        new Vue({
            el: '#root',


            data: {
                showModal: false
            }
        });

    </script>
@endsection