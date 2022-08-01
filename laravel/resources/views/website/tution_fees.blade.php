@extends('website.index')
@section('website_main_section')

    <!-- Content -->
    <div id="layout-content">
        <!--<div class="container">-->
        <div class="kingster-body-outer-wrapper ">
            <div class="kingster-body-wrapper clearfix  kingster-with-frame">
                <div id="" class="kingster-page-wrapper">
                    <div class="page-content-section">

                        <div class="tution_fees_title">
                            <h1>Undergraduate Program</h1>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="background: #212529 !important;" style="background: #212529 !important;">Name of Programs	</th>
                                <th scope="col" style="background: #212529 !important;">Admission Fees</th>
                                <th scope="col" style="background: #212529 !important;">After Discount Amount</th>
                                <th scope="col" style="background: #212529 !important;">Per Credit</th>
                                <th scope="col" style="background: #212529 !important;">After Discount</th>
                                <th scope="col" style="background: #212529 !important;">Total Credit Fee</th>
                                <th scope="col" style="background: #212529 !important;">Semester Fee (For each semester)</th>
                                <th scope="col" style="background: #212529 !important;">Total Fee After Discount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
{{--                                <th scope="row" style="background-color: #2C2F34 !important;color: fff;">1</th>--}}
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">B. Sc. in CSE</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">140.0</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">5,500/=	</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">761,000/=</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">36,120/=	</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">15,000/=	</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">812,120/=</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">812,120/=</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="tution_fees_title">
                            <h1>Graduate Program</h1>
                        </div>
                        <table class="table table-striped table-dark">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="background: #212529 !important;" style="background: #212529 !important;">Name of Programs	</th>
                                <th scope="col" style="background: #212529 !important;">Admission Fees</th>
                                <th scope="col" style="background: #212529 !important;">After Discount Amount</th>
                                <th scope="col" style="background: #212529 !important;">Per Credit</th>
                                <th scope="col" style="background: #212529 !important;">After Discount</th>
                                <th scope="col" style="background: #212529 !important;">Total Credit Fee</th>
                                <th scope="col" style="background: #212529 !important;">Semester Fee (For each semester)</th>
                                <th scope="col" style="background: #212529 !important;">Total Fee After Discount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
{{--                                <th scope="row" style="background-color: #2C2F34 !important;color: fff;">1</th>--}}
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">MS in CSE</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">140.0</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">5,500/=	</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">761,000/=</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">36,120/=	</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">15,000/=	</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">812,120/=</td>
                                <td style="background-color: #2C2F34 !important;color: fff;border-bottom: 1px solid #dee2e6 !important;    line-height: 3;text-align: center;font-size: 14px;font-weight: 600;font-family: inherit;">812,120/=</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--</div>-->

    </div>
@stop