@if(!app()->environment('local'))
    <script>
        (function (a, b, c, d, e, f, g) {
            c[d] = c[d] || function () {
                (c[d].q = c[d].q || []).push(arguments)
            }
            c['_lsAlias'] = c[d]
            e = a.createElement(b)
            e.type = 'text/javascript'
            e.async = true
            e.src = 'https://app.chatsupport.co/api/client/get/script/LS-463eb3b0'
            f = function () {
                g = a.getElementsByTagName(b)[0]
                g.parentNode.insertBefore(e, g)
            }
            c.addEventListener('load', f)
        })(document, 'script', window, '_ls')
        _ls('init', {'projectId': 'LS-463eb3b0'})
    </script>
@endif