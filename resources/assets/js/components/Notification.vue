<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-bell"> {{ notifications.length }}</span>
            Notifications <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <li v-for="notification in notifications" :key="notification.id">
                <a href="#" v-on:click="MarkAsRead(notification)">
                    You have one Notification<br>
                </a>
                <small>{{ notification.data.message}}</small>
            </li> 
            <li v-if="notifications.length == 0">
                No Notifications
            </li>                   
        </ul>
    </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods : {
            MarkAsRead: function(notification){
                var data = {
                    id : notification.id
                };
                axios.post('/notification/read',data).then(response => {
                    window.location.href = "/home";// place location of the url based on the data.id
                });
            }
        }
    }
</script>
