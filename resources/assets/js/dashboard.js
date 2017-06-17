import Help from "./components/Help.vue";
import CoursesSearch from "./components/admin/courses/Search.vue";
import MembersSearch from "./components/admin/members/Search.vue";
import GroupsSearch from "./components/admin/groups/Search.vue";

new Vue({
    el: '#app',
    components: {
        Help,
        CoursesSearch,
        MembersSearch,
        GroupsSearch
    }
})