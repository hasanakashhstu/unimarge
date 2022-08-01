@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center coursetitle">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">Admission / </h4>
                <h2 class="page-title"> Fees and Funding</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- tution section -->
    <div class="main-blog-area pd-top-100 pd-bottom-90 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12 pd-10">
                    <div class="tution-fees-page">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#tuitionandOtherFees" aria-expanded="true"
                                            aria-controls="tuitionandOtherFees">Tuition and Other Fees
                                        </button>
                                    </h2>
                                </div>

                                <div id="tuitionandOtherFees" class="collapse show" aria-labelledby="tuitionandOtherFees"
                                    data-parent="#tuitionandOtherFees">
                                    <div class="card-body">
                                        <h5 class="alert-primary">Payment of Fees</h5>
                                        <div>
                                            {!! Arr::get($metaData, 'payment_of_fees') !!}
                                        </div>

                                        <br>

                                        <h5 class="alert-primary">Undergraduate Fee Structure</h5>
                                        <div>
                                            {!! Arr::get($metaData, 'undergraduate_fee_structure') !!}
                                        </div>

                                        <br>

                                        <h5>B. Tuition Fees (Per Credit)</h5>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Program/Degree</th>
                                                    <th>Tuition Fees <br />(Per Credit)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($tutionFees as $tutionFee)
                                                    <tr>
                                                        <td width="">{{ $tutionFee->program_name }}</td>
                                                        <td width="150" nowrap="nowrap">{{ $tutionFee->fee_per_credit }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" style="text-align: center; color: red;">No
                                                            information available!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <br>

                                        <h5>C. Other Fees (Per Semester)</h5>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Particulars</th>
                                                    <th>Fees <br />(Per Semester)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($otherFees as $otherFee)
                                                <tr>
                                                    <td width="">{{ $otherFee->name }}</td>
                                                    <td width="150" nowrap="nowrap">{{ $otherFee->per_semester_fee }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td width="" colspan="2" class="text-danger text-center">Other Fee not available!</td>
                                                </tr>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>

                                        <br>

                                        <p class="text-danger text-center">***Tuition waiver may be available as per ZHSUST
                                            policy.***</p>

                                        <br>

                                        <h5 class="alert-primary">Admission Fee</h5>

                                        <div>
                                            {!! Arr::get($metaData, 'admission_fee') !!}
                                        </div>

                                        <br>

                                        <h5 class="alert-primary">Student Activity Fee</h5>
                                        <div>
                                            {!! Arr::get($metaData, 'student_activity_fee') !!}
                                        </div>
                                        <br>

                                        <h5 class="alert-primary">Other Expenses</h5>
                                        <div>
                                            {!! Arr::get($metaData, 'other_expenses') !!}
                                        </div>
                                        <br />

                                        <h5 class="alert-primary">Bank List for Tuition Fees</h5>
                                        <div>
                                            {!! Arr::get($metaData, 'bank_list_for_tuition_fees') !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#tuitionfeeCalculator" aria-expanded="true"
                                            aria-controls="tuitionfeeCalculator">
                                            Tuition fee Calculator
                                        </button>
                                    </h2>
                                </div>
                                <div id="tuitionfeeCalculator" class="collapse" aria-labelledby="tuitionfeeCalculator"
                                    data-parent="#tuitionfeeCalculator">
                                    <div class="card-body">
                                        @livewire('frontend.tution-fee-calculator', ['tutionFees' => $tutionFees])
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#paymentGuidelines" aria-expanded="true"
                                            aria-controls="paymentGuidelines">
                                            Payment Guidelines
                                        </button>
                                    </h2>
                                </div>
                                <div id="paymentGuidelines" class="collapse" aria-labelledby="paymentGuidelines"
                                    data-parent="#paymentGuidelines">
                                    <div class="card-body">
                                        <div>
                                            {!! Arr::get($metaData, 'payment_guidelines') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#waiverCalculatorandApply" aria-expanded="true"
                                            aria-controls="waiverCalculatorandApply">
                                            Scholarship for Students > Waiver Calculator and Apply
                                        </button>
                                    </h2>
                                </div>
                                <div id="waiverCalculatorandApply" class="collapse"
                                    aria-labelledby="waiverCalculatorandApply" data-parent="#waiverCalculatorandApply">
                                    <div class="card-body">
                                        Waiver Calculator and Apply
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-3 col-12 pd-10">
                    <div class="td-sidebar pd-10 bg-gray">
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Admission Fees & Fundings</h4>
                            <ul class="catagory-items">
                                <li><a href="#tuitionandOtherFees" type="button" data-toggle="collapse"
                                        data-target="#tuitionandOtherFees" aria-expanded="true"
                                        aria-controls="tuitionandOtherFees"><i class="fa fa-angle-right"></i>Tuition
                                        and Other
                                        Fees</a></li>

                                <li><a href="#tuitionfeeCalculator" type="button" data-toggle="collapse"
                                        data-target="#tuitionfeeCalculator" aria-expanded="true"
                                        aria-controls="tuitionfeeCalculator"><i class="fa fa-angle-right"></i>Tuition
                                        fee Calculator</a></li>

                                <li><a href="#paymentGuidelines" type="button" data-toggle="collapse"
                                        data-target="#paymentGuidelines" aria-expanded="true"
                                        aria-controls="paymentGuidelines"><i class="fa fa-angle-right"></i>Payment
                                        Guidelines</a></li>

                                <li><a href="#waiverCalculatorandApply" type="button" data-toggle="collapse"
                                        data-target="#waiverCalculatorandApply" aria-expanded="true"
                                        aria-controls="waiverCalculatorandApply"><i
                                            class="fa fa-angle-right"></i>Scholarship for Students >
                                        Waiver Calculator and Apply</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.sidebar -->
            </div>
        </div>
    </div>
    <!-- end tution section -->

@stop
