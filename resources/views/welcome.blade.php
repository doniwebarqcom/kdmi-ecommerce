@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
    <div class="boxed">
        <div class="overlay"></div>

        @include('layout.nav')
                
        @include('home.banner-slideshow')
    
        <!-- @ include('home.special-offer') -->

        @include('home.ads')
            
        <!-- @ include('home.category') -->

        <!-- @ include('home.our-product') -->

        <!-- @ include('home.most-viewed') -->

        <footer>
            <div class="container">
                <div class="row">
                    @include('layout.footer1')
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /footer -->

        @include('layout.footer-copyright')

    </div><!-- /.boxed -->
@endsection

@section('footer-script')
    <script type="text/javascript">
        
    </script>
@endsection