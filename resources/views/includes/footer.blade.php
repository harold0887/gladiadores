<footer class="footer footer-black footer-white text-primary {{$navbarClass}} ">
    <div class="container">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a class="text-primary" href="https://www.creative-tim.com" target="_blank">{{ __('Creative Tim') }}</a>
                    </li>
                    <li>
                        <a  class="text-primary" href="https://updivision.com" target="_blank">{{ __('UpDivision') }}</a>
                    </li>
                    <li>
                        <a  class="text-primary"href="http://blog.creative-tim.com/" target="_blank">{{ __('Blog') }}</a>
                    </li>
                    <li>
                        <a class="text-primary" href="https://www.creative-tim.com/license" target="_blank">{{ __('Licenses') }}</a>
                    </li>
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', made with ') }}<i class="fa fa-heart heart"></i>{{ __(' by ') }}<a class=" text-primary " href="https://www.creative-tim.com" target="_blank">{{ __('Creative Tim') }}</a>{{ __(' and ') }}<a class=" text-primary " target="_blank" href="https://updivision.com">{{ __('UPDIVISION') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>