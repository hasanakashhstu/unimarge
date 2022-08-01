@extends('website.index')
@section('website_main_section')

    <div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="col-lg-12">
                <div class="row row_border" id="about">
                    <h3 class="header_msg_section_title">History</h3>
                    <hr>
                    <div class="about_content">
                        <p>{{$website_setup->history}}</p>
                    </div>
                </div>
               <!--  <div class="row">
                    <div class="col-lg-4 about_img">
                        <img src="frontend_assets/index_files/number.jpg">
                    </div>
                    <div class="col-lg-4 about_img">
                        <img src="frontend_assets/index_files/images(1).jpg">
                    </div>
                    <div class="col-lg-4 about_img">
                        <img src="frontend_assets/index_files/number.jpg">
                    </div>
                </div> -->
              <!--   <div class="row">
                    <div class="co-lg-12 about_content">
                        <p>
                            TMSS ICT Domain has already implemented two projects of Bangladesh government, as example: Bari Bose Borolok (BBB) under ICT Division, where we have trained 14460 women in ICT knowledge and Advanced Freelancing Knowledge in 64 districts of Bangladesh. We have completed another project of Online Freelancing Training under LGSP-2 Project, where we have conducted 9 batches of in Dhaka District where we have trained 225 person.

                            There are some ongoing programs like, SEIP with PKSF and Bangladesh Bank, Banking IT Training with Janata Bank, Sonali Bank, Rupali Bank, etc; Community Climate Change Project (CCCP) with PKSF, Two development project with Unilever and many more.

                            We are also offering Commercial and Demand Driven Training Programs under TMSS ICT Ltd, where different types of IT and Banking Trainings are ongoing.
                        </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

@stop