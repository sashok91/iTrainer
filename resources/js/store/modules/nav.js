export default {
    namespaced: true,
    state: {
        drawer: false,
        userNav: [
            {icon:'school', text: 'Questions', route: {name:'viewQuestions'}},
            {icon:'bar_chart', text: 'Stats', route: {name:'stats'}},
        ],
        adminNav: [
            {icon:'school', text: 'Questions', route: {name:'viewQuestions'}},
            {icon:'bar_chart', text: 'Stats', route: {name:'stats'}},
            {icon:'local_library', text: 'Edit questions', route: {name:'adminQuestions'}},
            {icon:'group', text: 'Users', route: {name:'adminUsers'}},
            {icon:'mode_comment', text: 'Comments', route: {name:'adminComments'}},
        ],
        baseNav: [
            {icon:'school', text: 'Questions', route: {name:'viewQuestions'}},
        ]
    },

    mutations: {
        drawer(state, needShow) {
            state.drawer = needShow;
        }
    }
}

