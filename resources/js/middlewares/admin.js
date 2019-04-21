export default function isAdmin({next, router}) {

    let role = localStorage.getItem('role');

    if (role !== 'admin') {
        return router.push({name: 'login'});
    }

    return next();
}