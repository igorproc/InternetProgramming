//Иконка SignIn/SignUp
function initSignIn() {
    const $btn =  document.querySelector('.navbar__info-icon')
    const $frame = document.querySelector('.navbar__info')
    $btn.onclick = () => {
        $frame.classList.toggle('navbar__info_active')
    }
}


//Роутер по страницам
const $routeList = document.querySelectorAll('.navbar__menu-item')


initSignIn()

const router = {
    $wrapper: null,
    routes: [
        {
             $el: $routeList[0],
             path: '/',
             cmp: 'page-home'
        },
        {
            $el: $routeList[1],
            path: '/about',
            cmp: 'page-about'
        },
        {
            $el: $routeList[2],
            path: '/projects',
            cmp: 'page-projects'
        },
        {
            $el: $routeList[3],
            path: '/homework',
            cmp: 'page-homework'
        }
    ],
    callback: [],
    init(selector){
        const initFile = () => {
            const prefix = '/scripts/'
            this.routes.forEach(page => {
                const $script = document.createElement('script')
                $script.src = prefix + page.cmp + '.js'
                document.body.append($script)
            })
        }
        initFile()
        this.$wrapper = document.querySelector(selector)
        this.routes.forEach(page => {
            page.$el.onclick = (event) => {
                event.preventDefault()
                this.navigate(page.path)
            }
        })
        const path =  document.location.pathname
        this.navigate(path)
    },
    navigate(path){
        const route = this.routes.filter(item => item.path === path)[0] || {}
        const $page = document.createElement(route.cmp)
        const from = this.routes.filter(item => item.path === document.location.pathname)[0] || {}
        let isNexted = false
        const next = () => {
            if (isNexted) return false
            isNexted = true
            this.$wrapper.innerHTML = ''
            this.$wrapper.append($page)
            history.pushState(null, null, route.path)
        }
        $page.classList.add('container')
        this._stack(route, from,  $page, next)
    },
    _stack(){
        const [to, from, $el, next] = arguments
        this.callback.forEach(fn => {
            fn(to, from, $el, next)
        })
    }
}
const useRouteBefore = (fn) => {
    router.callback.push(fn)
}
const $curtain = document.querySelector('.curtain')

useRouteBefore((to, from, _, next) => {
    if(from.cmp === 'page-home' && to.cmp !== 'page-home'){
        $curtain.classList.add('curtain_active')
        setTimeout(() => {
            $curtain.classList.remove('curtain_active')
        }, 1000)
    }
    next()
})

useRouteBefore((to, from, _, next) => {
    if(to.cmp === 'page-home' && from.cmp !== 'page-home'){
        $curtain.classList.add('curtain_active-left')
        setTimeout(() => {
            $curtain.classList.remove('curtain_active-left')
        }, 1000)
    }
    next()
})

useRouteBefore((to, from, _, next) => {
    if(to.cmp === 'page-home' || from.cmp === 'page-home') return null
    next()
})

window.addEventListener("popstate", function() {
    router.navigate(document.location.pathname)
}, false)
router.init('main')