<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component... {{tempo}}</div>

                    <div class="panel-body">
                        I'm an example component - {{ teste }}!!!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        ready() {
            console.log('Component ready.')
        },
        data(){
           return {
                tempo: Date.now(),
                teste: 'Vue.js'
           }
        },
        created(){
            console.log('Component created.')
        }
    }
</script>
