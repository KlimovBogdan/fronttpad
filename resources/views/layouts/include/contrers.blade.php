@prepend('scripts')
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push    = n;
            n.loaded  = !0;
            n.version = '2.0';
            n.queue   = [];
            t         = b.createElement(e);
            t.async   = !0;
            t.src     = v;
            s         = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
          'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '343069903421062');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" alt="facebook pixel"
                   src="https://www.facebook.com/tr?id=343069903421062&ev=PageVie.."
        /></noscript>
    <!-- End Facebook Pixel Code -->
@endprepend
@prepend('scripts')
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };

            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })

        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(68515060, "init", {
            clickmap:            true,
            trackLinks:          true,
            accurateTrackBounce: true,
            webvisor:            true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/68515060" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
@endprepend
@prepend('scripts')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180929426-1"></script>
@endprepend
@prepend('scripts')
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-180929426-1');
    </script>
@endprepend

@prepend('scripts')
    <script>
        const showThanks = () => {
            $("#programsModalThanks").modal('show')
        }
    </script>
@endprepend
