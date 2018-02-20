@extends('layout')


@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
@endsection
@section('content')
    <style type="text/css">
        .form-section {
            display: none
        }

        .form-section.current {
            display: block !important;
        }

        .parsley-errors-list {
            color: red
        }

        .parsley-success {
            color: green;
        }
    </style>

    <h1>Parsley JS Issue</h1>
    <h3>See your dev tools console</h3>
    <hr/>
    <br>

    <div class="panel panel-default">
        <div class="panel-body">
            <form class="demo-form">
                <!-- Session 1 -->
                <section class="form-section">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="nome" class="form-control" id="nome" placeholder="Digite o nome" required="">
                    </div>
                    <div class="form-group">
                        <label for="license_plate">Você sabe a plata do carro?</label>

                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" value="1" name="is_insured">Sim</label>
                            <label class="radio-inline"><input type="radio" value="2" name="is_insured">Não</label>
                        </div>
                    </div>
                    <!-- Conditional is_insured -->
                        <!-- Conditional is_insured (NO) -->
                    <div id="conditional_is_insured_no" class="hide">
                        <input type="license_plate" class="form-control" id="license_plate" placeholder="Digite a placa">
                    </div>
                        <!-- Conditional is_insured (YES) -->
                    <div class="panel panel-default hide" id="conditional_is_insured_yes">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="vehicle_brand">Qual a marca do veículo?</label>
                                <select class="form-control" name="vehicle_brand" id="vehicle_brand">
                                    <option value="1">Chevrolet</option>
                                    <option value="2">Citroen</option>
                                    <option value="3">Fiat</option>
                                    <option value="4">Ford</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_year_manufacture">Ano de fabricação</label>
                                <select class="form-control" name="vehicle_year_manufacture" id="vehicle_year_manufacture">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_year_model">Ano do modelo</label>
                                <select class="form-control" name="vehicle_year_model" id="vehicle_year_model">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_version">Modelo</label>
                                <select class="form-control" name="vehicle_version" id="vehicle_version">
                                    <option value="1">Ducato Cargo</option>
                                    <option value="2">Ducato Minibus</option>
                                    <option value="3">Ducato Sport</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline" id="vehicle_zero_km">
                                <input type="checkbox" name="vehicle_zero_km" value="1" name="vehicle_zero_km">Zero KM</label>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Session 2 -->
                <section class="form-section">
                    <label>Email:</label>
                    <input class="form-control" name="email" placeholder="Type anything"
                           required=""
                           minlength="3"
                           type="email">
                    <p style="color: blue">You can not proceed next even if this field is valid.</p>
                </section>

                <!-- Navigation Buttons -->
                <div class="form-navigation">
                    <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
                    <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
                    <button type="submit" class="btn btn-default pull-right">Submit</button>
                    <span class="clearfix"></span>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/pt-BR.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/bindings/inputmask.binding.js"></script>--}}
{{--    <script src="{{ asset('node_modules/inputmask/dist/jquery.inputmask.bundle.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript">
        // Code taken from
        // http://parsleyjs.org/doc/examples/multisteps.html
        var $sections = $('.form-section');

        function navigateTo(index) {
            // Mark the current section with the class 'current'
            $sections
                .removeClass('current')
                .eq(index)
                .addClass('current');
            // Show only the navigation buttons that make sense for the current section:
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }

        function curIndex() {
            // Return the current index by looking at which section has the class 'current'
            return $sections.index($sections.filter('.current'));
        }

        // Previous button is easy, just go back
        $('.form-navigation .previous').click(function () {
            console.log('click previous');
            navigateTo(curIndex() - 1);
        });

        // Next button goes forward iff current block validates
        $('.form-navigation .next').click(function () {
            console.log('click next');
            if ($('.demo-form').parsley().validate({group: 'block-' + curIndex()})) {
                console.log('section is valid moved to next');
                navigateTo(curIndex() + 1);
            } else {
                console.log('section is not valid')
            }

        });

        // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
        $sections.each(function (index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        });
        navigateTo(0); // Start at the beginning


        // hook form submit event
        $(".demo-form").on('submit', function (e) {
            e.preventDefault();
            console.log('form submit');

            var instance = $(this).parsley();

            alert('form status = ', instance.isValid());

            return false;
        });

        $(function(){

            //Conditional is_insured
            $("#license_plate").inputmask("aaa-9999");

                // is insured radio button (YES)
                $("input[name=is_insured]").change(function() {
                    if ($("input[name=is_insured]:checked").val() == 1) {
                        $("#conditional_is_insured_yes").removeClass('hide');
                        $("#conditional_is_insured_no").addClass('hide');
                    }
                    else {
                        $("#conditional_is_insured_yes").addClass('hide');
                        $("#conditional_is_insured_no").removeClass('hide');
                    }
                });

                //vehicle_brand
                $("#vehicle_brand").change(function(){
                    $el = $("#vehicle_year_manufacture");
                    var date = new Date();
                    var options = '';
                    for(i=0;i<22;++i){
                        var decresedYear = date.getFullYear() - i;
                        options +='<option value="'+decresedYear+'">'+decresedYear+'</option>';
                    }
                    $($el).html(options);
                });
                //year_manufacture
                $("#vehicle_year_manufacture").change(function(){
                    $el = $("#vehicle_year_model");
                    var manufactureYear = parseInt($(this).val());
                    var options ='<option value="'+(manufactureYear+1)+'">'+(manufactureYear+1)+'</option>';
                    options +='<option value="'+manufactureYear+'">'+manufactureYear+'</option>';
                    $($el).html(options);
                });



            //END Conditional is_insured
        });// END ready
    </script>
@endsection