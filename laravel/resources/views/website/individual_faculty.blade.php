@extends('website.index')
@section('website_main_index')
    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">Department Name / Faculty Member</h4>
                <h2 class="page-title">Profile</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- Facuty Member page -->
    <div class="main-blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 pd-10">
                    <div class="course-details-page">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="thumb">
                                    <img src="images/dean.jpg" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-8 align-self-center">
                                <div class="details">
                                    <h4 class="name">Md. XXXX XXXX</h4>
                                    <p class="designation">Assistant Proffessor</p>
                                    <p class="department-name">Department of Electrical & Electronic Engineering</p>
                                    <div class="contact-area no-padding-margin">
                                        <ul class="details no-padding-margin">
                                            <li><i class="fa fa-map-marker"></i>Dhaka Bangladesh
                                                P.S.: Bhedergonj, Dist.: Shariatpur
                                            </li>
                                            <li><i class="fa fa-envelope"></i>zhsust.campus@gmail.com</li>
                                            <li><i class="fa fa-phone"></i> +880 13137 60750</li>
                                        </ul>
                                        <ul class="social-media style-base no-padding-margin">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="align-self-lg-start text-left pd-top-10">
                                        <a class="btn btn-border-base b-animate-3 text-right" href=""><i
                                                    class="fa fa-download" aria-hidden="true"></i> Download CV</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row pd-top-20">
                            <div class="col-lg-12">
                                <!-- <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Collapsible Group Item #1
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                               Item #1
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Collapsible Group Item #2
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                Item #2
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    Collapsible Group Item #3
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                Item #3
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


                                <div class="panel-group" id="accordionMenu" role="tablist"
                                     aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#academic_background" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Academic Background
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="academic_background" class="panel-collapse collapse"
                                             role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <div>
                                                    <ul>
                                                        <li>PhD in Computer Science, University of Southampton, UK
                                                        </li>
                                                        <li>MSc in Computer Science, National University of
                                                            Singapore,</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#short_biography" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Short Biography
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="short_biography" class="panel-collapse collapse" role="tabpanel"
                                             aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <label style="color: lightslategray">no content</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne41">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#collapse-41" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Professional Experience
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-41" class="panel-collapse collapse" role="tabpanel"
                                             aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <div>
                                                    <h4><strong>University Teaching (Full Time)</strong></h4>

                                                    <ul>
                                                        <li><strong>Professor</strong> (July 2019 – To date)
                                                            <br>Department of Computer Science and Engineering
                                                            <br>East West University, Dhaka, Bangladesh
                                                            <br>
                                                            <br>
                                                        </li>
                                                        <li><strong>Associate
                                                                Professor&nbsp;</strong>(July'2013~June2019)
                                                            <br>Department of Computer Science and Engineering
                                                            <br>East West University, Dhaka, Bangladesh
                                                            <br>
                                                            <br>
                                                        </li>
                                                        <li><strong>Assistant Professor</strong> (May 2011 – June
                                                            2013)
                                                            <br>Department of Computer Science and Engineering
                                                            <br>East West University, Dhaka, Bangladesh
                                                            <br>
                                                        </li>
                                                    </ul>

                                                    <h4>
                                                        <br>
                                                    </h4>

                                                    <h4><strong>Post-Doctoral Research Position</strong></h4>

                                                    <ul>
                                                        <li><strong>Research Associate in Software
                                                                Engineering</strong> (May 2010-Feb’11)
                                                            <br>Department of Computer Science, University of York,
                                                            UK,
                                                            <br><strong>Project:</strong> <em>High-integrity Java
                                                                Applications using Circus</em>.
                                                            <br>Funded by EPSRC
                                                            <br>
                                                            <br>
                                                        </li>
                                                        <li><strong>Post-Doctoral Research Fellow</strong> (April
                                                            2008 – April 2010)
                                                            <br>Department of Computing Science, University of
                                                            Glasgow, UK,
                                                            <br><strong>Project:</strong> <em>Advanced Symmetry
                                                                Reduction Tools for Explicit State Model
                                                                Checking</em>.
                                                            <br>Funded by EPSRC</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne42">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#collapse-42" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Research Interest
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-42" class="panel-collapse collapse " role="tabpanel"
                                             aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <div>
                                                    <ul>
                                                        <li>Software Engineering</li>
                                                        <li>Data Analytics</li>
                                                    </ul>

                                                    <h4 tabindex="-1">
                                                        <br>
                                                    </h4>

                                                    <h4 tabindex="-1"><strong>On-Going Projects</strong></h4>

                                                    <ul>
                                                        <li>Classification and Analysis of Software Defects</li>
                                                        <li>Analysis of Network Intrusion and Detection: Data Mining
                                                            Approach (Data Mining and Cyber Security)</li>
                                                        <li>Rough Set in Bioinformatics</li>
                                                        <li>Application of Data Analytics in Supply Chain Management
                                                        </li>
                                                        <li>Data Mining in Bioinformatics, and Disease Diagnosis and
                                                            Prediction</li>
                                                        <li>Software Product Line Requirement Management</li>
                                                        <li>Recommender-Based Service Composition Verification</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne43">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#collapse-43" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Selected Publications
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-43" class="panel-collapse collapse " role="tabpanel"
                                             aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <!--                        <div class="row">-->
                                                <!--                            <div class="col-md-12">-->
                                                <!--<h5 class="pub-title"></h5>
                            <div class="desc">

                            </div>-->
                                                <!--                                ====================-->
                                                <div class="dept-tabbable-panel ">
                                                    <div class="dept-tabbable-line">
                                                        <ul class="nav nav-tabs ">
                                                            <li class="active">
                                                                <!--                                                <a href="#tab-7" data-toggle="tab" aria-expanded="false">-->
                                                                <a href="#tab-1" data-toggle="tab"
                                                                   aria-expanded="false">
                                                                    Books</a>
                                                            </li>
                                                            <li class="">
                                                                <!--                                                <a href="#tab-8" data-toggle="tab" aria-expanded="false">-->
                                                                <a href="#tab-2" data-toggle="tab"
                                                                   aria-expanded="false">
                                                                    Conferences Publications</a>
                                                            </li>
                                                            <li class="">
                                                                <!--                                                <a href="#tab-9" data-toggle="tab" aria-expanded="false">-->
                                                                <a href="#tab-3" data-toggle="tab"
                                                                   aria-expanded="false">
                                                                    Journal and Book Chapter Publications</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <!--                                            <div class="tab-pane active" id="tab-7">-->
                                                            <div class="tab-pane active" id="tab-1">
                                                                <div class="desc">
                                                                    <ol>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, <strong>Modeling Variants for
                                                                                Software Product Line – Impact on
                                                                                UML Models</strong>, Lambert
                                                                            Academic Publishing, ISBN:
                                                                            978-3-8484-9576-4.</li>
                                                                        <li style="text-align: justify;">Md Nawab
                                                                            Yousuf Ali, Shamim Ripon and Ghulam
                                                                            Farooque Ahmed,&nbsp;<strong>A Framework
                                                                                for Bridging Bangla and UNL –
                                                                                Analysis and Generation Rules for
                                                                                Bangla-UNL Conversion</strong>,
                                                                            Lambert Academic Publishing, ISBN:
                                                                            978-3-659-00062-1.</li>
                                                                    </ol>
                                                                </div>
                                                                <!--                                                <div class="col-md-12 text-center">No notice found</div>-->
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!--                                            <div class="tab-pane active" id="tab-8">-->
                                                            <div class="tab-pane " id="tab-2">
                                                                <div class="desc">
                                                                    <ol>
                                                                        <li>Md. Rakibul Hasan Shezan, Mohammed Nasif
                                                                            Zawad, Yeasir Arafat Shahed, Shamim H
                                                                            Ripon, <strong>Bangla Fake News
                                                                                Detection Using Hybrid Deep Learning
                                                                                Models</strong>, <em>International
                                                                                Conference on Big Data, IoT and
                                                                                Machine Learning (BIM 2021)</em>,
                                                                            September 23-25, 2021, Cox’s Bazar,
                                                                            Bangladesh. (Accepted).</li>
                                                                        <li>Md Al-Imran, Kazi Jahidur Rahaman,
                                                                            Mohammad Rasel, and Shamim H. Ripon,
                                                                            <strong>An Analytical Evaluation of a
                                                                                Deep Learning Model to Detect
                                                                                Network Intrusion</strong>, <em>The
                                                                                14th Multi-Disciplinary
                                                                                International Conference on
                                                                                Artificial Intelligence (MIWAI
                                                                                2021)</em>, July 2-3, 2021, Seoul,
                                                                            South Korea, Springer, LNAI.</li>
                                                                        <li>Ramisha Anjum, Rubaiya Rahman Dipti,
                                                                            Harun Or Rashid and Shamim Ripon,
                                                                            <strong>An Efficient Breast Cancer
                                                                                Analysis Technique by Using a
                                                                                Combination of HOG and Canny Edge
                                                                                Detection Techniques</strong>,
                                                                            <em>5th International Conference on
                                                                                Trends in Electronics and
                                                                                Informatics ICOEI 2021</em>, 3-5,
                                                                            June 2021, TamilNadu, India.</li>
                                                                        <li>Md. Masrafi Rahman, Raiyan Rashid
                                                                            Prodhan, Yeasir Hossain Shishir and
                                                                            Shamim Ripon, <strong>Analyzing and
                                                                                Evaluating Boosting-Based CNN
                                                                                Algorithms for Image
                                                                                Classification</strong>, <em>The
                                                                                IEEE International Conference on
                                                                                Intelligent Technologies(CONIT
                                                                                2021)</em>, 25-27 June, 2021,
                                                                            Karnataka, India.</li>
                                                                        <li>Md Anuvob Pradan, Mahia Binte Mizan,
                                                                            Moon Howlader and Shamim Ripon,
                                                                            <strong>An Efficient Approach to
                                                                                Software Fault Prediction,</strong>
                                                                            In: Bindhu V., Tavares J.M.R.S.,
                                                                            Boulogeorgos AA.A., Vuppalapati C. (eds)
                                                                            <em>International Conference on
                                                                                Communication, Computing and
                                                                                Electronics Systems</em>. Lecture
                                                                            Notes in Electrical Engineering, vol
                                                                            733, pp 221-237. Springer, Singapore.
                                                                            https://doi.org/10.1007/978-981-33-4909-4_16
                                                                        </li>
                                                                        <li>Mir Moynuddin Ahmed Shibly, Tahmina
                                                                            Akter Tisha, and Shamim H Ripon,
                                                                            <strong>Stacked Generalization Ensemble
                                                                                Method to Classify Bngla Handwritten
                                                                                Character</strong>, Proceedings of
                                                                            International Conference on Sustainable
                                                                            Expert Systems - ICSES 2020, 28-29,
                                                                            September 2020, ecture Notes in Networks
                                                                            and Systems 176, pp. 621-638. Springer
                                                                            Nature Singapore Pte Ltd.
                                                                            https://doi.org/10.1007/978-981-33-4355-9_46
                                                                        </li>
                                                                        <li>Shamse Tasnim Cynthia, Md. Golam Rasul
                                                                            and Shamim Ripon, <strong>Effect of
                                                                                Feature Selection in Software Fault
                                                                                Detection</strong>, <em>13th Multi-
                                                                                disciplinary International
                                                                                Conference on Artificial
                                                                                Intelligence</em>, November 17-19,
                                                                            2019. KualaLumpur, MALAYSIA, 2019. LNCS
                                                                            11909</li>
                                                                        <li style="text-align: justify;">Shamse
                                                                            Tasnim Cynthia and Shamim H Ripon,
                                                                            <strong>Predicting and Classifying
                                                                                Software Faults: A Data Mining
                                                                                Approach</strong>, <em>7th
                                                                                International Conference on Computer
                                                                                and Communications Management (ICCCM
                                                                                2019)</em> to be held in Bangkok,
                                                                            Thailand, July 27-29, 2019.</li>
                                                                        <li style="text-align: justify;">Md. Golam
                                                                            Sarowar, Fahima Qasim and Shamim H.
                                                                            Ripon, <strong>Tuberous Sclerosis
                                                                                Complex (TSC) Disease Prediction
                                                                                Using Optimized Convolutional Neural
                                                                                Network</strong>, <em>7th
                                                                                International Conference on Computer
                                                                                and Communications Management (ICCCM
                                                                                2019)</em> to be held in Bangkok,
                                                                            Thailand during July 27-29, 2019.</li>
                                                                        <li style="text-align: justify;">
                                                                            Arif-Ul-Islam and Shamim H. Ripon,
                                                                            <strong>Smart Water System at House
                                                                                Using Arduino Uno and C# Desktop
                                                                                Application to Reduce Water Wastage
                                                                                and Energy Loss</strong>,
                                                                            <em>International Conference on Advances
                                                                                in Science, Engineering and Robotics
                                                                                Technology (ICASERT 2019)</em> held
                                                                            at East West University (EWU), Dhaka,
                                                                            Bangladesh on 3-5 May 2019.</li>
                                                                        <li style="text-align: justify;">Nuruddin
                                                                            Bhuiyan, Shantanu Rahut, Razwan Tanvir
                                                                            and Shamim Ripon, <strong>An Automatic
                                                                                Acute Lymphoblastic Leukemia
                                                                                Detection and Comparative Analysis
                                                                                from Microscopic Image</strong>,
                                                                            <em>IEEE&nbsp;6th International
                                                                                Conference on Control, Decision and
                                                                                Information Technologies
                                                                                (CODIT’19)</em>, Paris, France on
                                                                            April 23-26, 2019.</li>
                                                                        <li style="text-align: justify;">Md. Golam
                                                                            Sarowar, Mushfiqur Rahman, Md. Nawab
                                                                            Yousuf Ali, Shamim H Ripon, <strong>A
                                                                                hybrid machine learning approach for
                                                                                analysis and classification of
                                                                                social network sentiments</strong>,
                                                                            &nbsp;<em>IEEE 5th International
                                                                                Conference for Convergence in
                                                                                Technology</em> 2019, Pune,
                                                                            Maharashtra, India</li>
                                                                        <li style="text-align: justify;">
                                                                            Arif-Ul-Islam and Shamim H Ripon,
                                                                            <strong>Performance Analysis of
                                                                                Classification and Rule Induction
                                                                                Methods on Chronic Kidney
                                                                                Disease,&nbsp;</strong><em>2nd
                                                                                International Conference on
                                                                                Electrical, Computer and
                                                                                Communication Engieering
                                                                                (ECCE)</em>, 7-9 Feb 2019, Cox’s
                                                                            Bazar, Bangladesh.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Farhana Sultana and Fahmida
                                                                            Rahman, <strong>Verification of Service
                                                                                Composition and Compensation By
                                                                                Using Process Algebra</strong>,
                                                                            <em>5th International Conference on
                                                                                Network and Computing
                                                                                Technologies</em> (ICNCT 2017), to
                                                                            be held in Bali, Indonesia, February
                                                                            20-22, 2017 (** <strong>Best Paper
                                                                                Presenter Award</strong> **).</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Javedul Ferdous, Md. Delwar
                                                                            Hossain and Mushfiqur Rahman,
                                                                            <strong>Verification of SPL Feature
                                                                                Model by Using Bayesian
                                                                                Network</strong>, <em>4th
                                                                                International Conference on Computer
                                                                                Engineering &amp; Mathematical
                                                                                Sciences (ICCEMS 2015)</em>
                                                                            Langkawi, Malaysia, December 10-11,
                                                                            2015.</li>
                                                                        <li style="text-align: justify;">Musfiqur
                                                                            Rahman and Shamim Ripon, <strong>Using
                                                                                Bayesian Networks to Model and
                                                                                Analyze Software Product Line
                                                                                Feature Model</strong>, <em>8th
                                                                                Multi-Disciplinary International
                                                                                Workshop on Artificial Intelligence
                                                                                (MIWAI 2014)</em> Bangalore, India,
                                                                            December 8-10, 2014.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Afroza Yeasmin, Yeaminar Rashid
                                                                            and K. M. Imtiaz Ud-Din,
                                                                            <strong>Analysing and Model Checking a
                                                                                MANET Security Protocol
                                                                                Suite</strong>, <em>2014 2nd
                                                                                International Conference on
                                                                                Information and Computer Technology
                                                                                (ICICT 2014),</em>, Sept. 6-8 2014,
                                                                            Chengdu, China (Oral Presentation Only)
                                                                            (<strong>Best Oral
                                                                                Presentation</strong>).</li>
                                                                        <li style="text-align: justify;">Shamim H
                                                                            Ripon, Syed Fahin Ahmed,
                                                                            AfrozaYasmin,Yaminar Rashid and K. M.
                                                                            Imtiaz-UD-Din, <strong>Formal Analysis
                                                                                of a Ranked Neighbour MANET Protocol
                                                                                Suite</strong>, <em>International
                                                                                Conference on Communication Software
                                                                                and Network (ICCSN 2014)</em>, May
                                                                            24-26, 2014, Singapore.</li>
                                                                        <li style="text-align: justify;">Sumaiya
                                                                            Kabir, Shamim Ripon, Mamunur Rahman and
                                                                            Tanjim Rahman, <strong>Knowledge-Based
                                                                                Data Mining Using Semantic
                                                                                Web</strong>, <em>2013 International
                                                                                Conference on Applied Computing,
                                                                                Computer Science, and Computer
                                                                                Engineering (ICACC 2013)</em>
                                                                            Saipan, USA, December 28-29, 2013.</li>
                                                                        <li style="text-align: justify;">Nakul C.
                                                                            Das, Shamim Ripon, Orin Hossain and
                                                                            Mohammad Salah Uddin,
                                                                            <strong>Requirement Analysis of Product
                                                                                Line Based Semantic Web
                                                                                Services</strong>, <em>2013 4th
                                                                                International Conference on
                                                                                Networking and Information
                                                                                Technology (ICNIT 2013)</em>,
                                                                            November 23-24, Bangkok, Thailand.</li>
                                                                        <li style="text-align: justify;">Md. Salah
                                                                            Uddin, Shamim Ripon and Nakul C
                                                                            Das,<strong>&nbsp;A Comparative Study of
                                                                                Web Service Composition via BPEL and
                                                                                Petri Nets</strong>, <em>2013 4th
                                                                                International Conference on Software
                                                                                and Computing Technology (ICSCT
                                                                                2013)</em>, October 24-25, 2013,
                                                                            Konya, Turkey.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Moshiur Mahamud Piash, Sheikh Md.
                                                                            Alam Hossain and Md. Salah Uddin,
                                                                            <strong>Semantic Web Based Analysis of
                                                                                Product Line Variant Model</strong>,
                                                                            <em>2013 2nd International Conference on
                                                                                Computer Technology and Science
                                                                                (ICCTS 2013)</em>, August 3-4,
                                                                            Dubai, UAE (** <strong>Best Paper
                                                                                Presentation Award</strong> **).
                                                                        </li>
                                                                        <li style="text-align: justify;">K. M.
                                                                            Imtiaz-Ud-Din, Touhid Bhuiyan and Shamim
                                                                            Ripon, <strong>Circle of Trust – One Hop
                                                                                Trust Based Security Paradigm for
                                                                                Resource Constraint MANET</strong>,
                                                                            <em>International Conference on Advanced
                                                                                Computing, Networking, and
                                                                                Informatics
                                                                                (ICACNI-2013),</em>Chhattisgarh,
                                                                            India.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Sk. Jahir Hossain, <strong>A
                                                                                Systematic Management of Software
                                                                                Product Line Variants</strong>,
                                                                            <em>Third International Conference on
                                                                                Computer Science, Engineering and
                                                                                Applications (ICCSEA-2013)</em>,
                                                                            Delhi, India (Springer)</li>
                                                                        <li style="text-align: justify;">Mijanur
                                                                            Rahman and Shamim Ripon,
                                                                            <strong>Elicitation and Modeling Non
                                                                                -Functional Requirements Functional
                                                                                Requirements – A POS Study
                                                                                Case</strong>, <em>2013 2nd
                                                                                International Conference on Network
                                                                                and Computer Science (ICNCS
                                                                                2013)</em>, Singapore.</li>
                                                                        <li style="text-align: justify;">Moshiur
                                                                            Mahamud Piash, Shamim Ripon and Sheikh
                                                                            Md. Alam Hossain, <strong>A Semantic Web
                                                                                Approach to Verifying Product Line
                                                                                Variant Requirements</strong>,
                                                                            <em>Fourth International Conference on
                                                                                Advances in Communication, Network,
                                                                                and Computing – CNC 2013, LNICST,
                                                                                pp. 186-191</em> Chennai, India
                                                                            (Springer).</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sumaya Mahbub and K. M.
                                                                            Imtiaz-ud-Din, <strong>Verification of A
                                                                                Security Adaptive Protocol Suite
                                                                                Using SPIN</strong>, <em>2nd
                                                                                International Conference on Security
                                                                                Science and Technology (ICSST
                                                                                2013)</em>, April 1-2, 2013,
                                                                            Singapore.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Mijanur Rahman,
                                                                            <strong>Modeling Nonfunctional
                                                                                Requirements – A Case
                                                                                Study</strong>, <em>International
                                                                                Conference on Future Trends in
                                                                                Computing and Communication
                                                                                Technologies (FTCom)&nbsp;</em>,
                                                                            Malacca, Malaysia.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Moshiur Mahamud Piash and Sheikh
                                                                            Md. Alam Hossain, <strong>Modeling
                                                                                Product Line Variants – Semantic Web
                                                                                Approach</strong>, <em>2012
                                                                                International Conference on Software
                                                                                and Computing Technology (ICSCT
                                                                                2012)</em>, Kuala Lumpur, Malaysia.
                                                                        </li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Aoyan Barua and Mohammad Salah
                                                                            Uddin, <strong>Analysis Tool for
                                                                                UNL-Based Knowledge
                                                                                Representation</strong>,
                                                                            <em>International Workshop for Promising
                                                                                Researcher in Computer Science
                                                                                Applications and Technology
                                                                                (WPR’12)</em> in conjunction with
                                                                            <em>International Conference on Advanced
                                                                                Computer Science Applications and
                                                                                Technologies – ACSAT2012</em>, Kuala
                                                                            Lumpur, Malaysia.</li>
                                                                        <li style="text-align: justify;">Shaila
                                                                            Sharmeen, Humayun Kabir, M. Ameer Ali,
                                                                            Shamim Ripon and Nikhil Chandra Shil,
                                                                            <strong>Vendor Selection Using Genetic
                                                                                Algorithm</strong>, <em>The 6th
                                                                                International Conference on Soft
                                                                                Computing and Intelligent Systems,
                                                                                The 13th International Symposium on
                                                                                Advanced Intelligent Systems</em>,
                                                                            Kobe, Japan.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Md. Salah Uddin and Aoyan Barua,
                                                                            <strong>Web Service Composition – BPEL
                                                                                vs Process Algebra</strong>,
                                                                            <em>International Conference on Advanced
                                                                                Computer Science Applications and
                                                                                Technologies – ACSAT2012</em>, 26-28
                                                                            Nov, 2012, pp. 150-155, Kuala Lumpur,
                                                                            Malaysia, IEEE. DOI:
                                                                            10.1109/ACSAT.2012.47</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain, Keya Azad and
                                                                            Meheedi Hassan, <strong>Formal Modeling
                                                                                of Product-Line Variant
                                                                                Requirements</strong>, <em>2012
                                                                                International Conference on Software
                                                                                and Computer Engineering (ICSCE
                                                                                2012)</em>, Singapore.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain, Keya Azad and
                                                                            Meheedi Hassan, <strong>Modeling and
                                                                                Analysis of Product Line
                                                                                Variants</strong>, <em>International
                                                                                Workshop on Requirements Engineering
                                                                                Practices On Software Product Line
                                                                                Engineering (REPOS 2012)</em>, In
                                                                            conjunction with SPLC’12. (ACM)</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain, Keya Azad and
                                                                            Meheedi Hasan, <strong>Logic
                                                                                Verification of Product-Line Variant
                                                                                Requirements</strong>, <em>2012
                                                                                African Conference on Software
                                                                                Engineering &amp; Applied Computing
                                                                                (ACSEAC)</em>, pp. 29-33, 24-26
                                                                            Sept. 2012, Gaborone.
                                                                            DOI:10.1109/ACSEAC.2012.14 (IEEE)</li>
                                                                        <li style="text-align: justify;">Shaikh
                                                                            Muhammad Allayear, Sung Soon Park and
                                                                            Shamim H. Ripon, <strong>Adaptation
                                                                                Mechanism of iSCSI Protocol for NAS
                                                                                Storage Solution in Wireless
                                                                                Environment</strong>, <em>Massive
                                                                                Data Storage and Processing 2012
                                                                                (MDSP 2012), LNCS 7419</em>.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, and Alice Miller,
                                                                            <strong>Verification of a Symmetry
                                                                                Detection Technique using
                                                                                PVS</strong>, Automated Verification
                                                                            of Critical Systems (AVOCS 2010), Sept,
                                                                            2010, Dusseldorf, Germany.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Alice Miller, <strong>A
                                                                                Semantic Embedding of Promela-Lite
                                                                                in PVS</strong>, <em>9th
                                                                                International Workshop on Automated
                                                                                Verification of Critical Systems,
                                                                                AVOCS 2009</em>, , UK, pages
                                                                            257-259, O’Reilly, L., Roggenbach, M.,
                                                                            Eds.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Alice Miller,
                                                                            <strong>Embedding of Promela-Lite Syntax
                                                                                and Semantic into PVS</strong>,
                                                                            <em>Automated Reasoning Workshop, AWR
                                                                                2009, Bridging the Gap between
                                                                                Theory and Practice</em>, University
                                                                            of Liverpool, UK, April’09.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Michael Butler, <strong>PVS
                                                                                Embedding of cCSP Semantic Models
                                                                                and their Relationship</strong>,
                                                                            <em>8th International Workshop on
                                                                                Automated Verification of Critical
                                                                                Systems, AVOCS 2008</em>, , UK,
                                                                            pages 128-142, Calder, M., Miller, A.,
                                                                            Eds.</li>
                                                                        <li style="text-align: justify;">Michael
                                                                            Butler and Shamim Ripon,
                                                                            <strong>Executable Semantics for
                                                                                Compensating CSP</strong>, <em>In
                                                                                Proceedings of 2nd International
                                                                                Workshop on Web Services and Formal
                                                                                Methods</em> LNCS 3670, pages 243-
                                                                            256, Versailles. Bravetti, M., Kloul, L.
                                                                            and Zavattaro, G., Eds, 2005.</li>
                                                                        <li style="text-align: justify;">Kamrul
                                                                            Hasan Talukder, Khademul Islam Molla and
                                                                            Shamim Ripon, <strong>On the Distributed
                                                                                Memory MIMD Architectures</strong>,
                                                                            <em>Proc. of the 7th International
                                                                                Conference on Computer and
                                                                                Information Technology (ICCIT
                                                                                2004)</em>, BRAC University, Dhaka,
                                                                            Bangladesh, December 2004, pp. 569-574.
                                                                            ISBN: 984-32-1836-1.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Kamrul Hasan Talukder, and
                                                                            Khademul Islam Molla, <strong>Decision
                                                                                tree for the structure of adaptive
                                                                                interview</strong>, <em>Proc. of the
                                                                                6th International Conference on
                                                                                Computer and Information Technology
                                                                                (ICCIT 2003)</em>, Jahangirnagar
                                                                            University, Dhaka, Bangladesh,
                                                                            pp.132-135, Vol:I.</li>
                                                                        <li style="text-align: justify;">Kamrul
                                                                            Hasan Talukder, Khademul Islam Molla and
                                                                            Shamim Ripon, <strong>A comparative
                                                                                study of two solution methods to 0/1
                                                                                knapsack problem</strong>, <em>Proc.
                                                                                of the 6th International Conference
                                                                                on Computer and Information
                                                                                Technology (ICCIT 2003)</em>,
                                                                            Jahangirnagar University, Dhaka,
                                                                            Bangladesh, pp. 71-74, Vol: I.</li>
                                                                        <li style="text-align: justify;">Kamrul
                                                                            Hasan Talukder, Khademul Islam Molla and
                                                                            Shamim Ripon, <strong>A BDD-Based
                                                                                Approach to 0/1 Knapsack
                                                                                Problem</strong>, <em>International
                                                                                Conference on Computer Science and
                                                                                its Application (ICCSA -2003)</em>
                                                                            July 01-02, 2003, San Diego, California,
                                                                            USA.</li>
                                                                        <li style="text-align: justify;">Kamrul
                                                                            Hasan Talukder, Khademul Islam Molla and
                                                                            Shamim Ripon, <strong>An Approach to 0/1
                                                                                Knapsack Problem</strong>,
                                                                            <em>International Conference on Computer
                                                                                Science and its Application (ICCSA
                                                                                -2003)</em> July 01-02, 2003, San
                                                                            Diego, California, USA.</li>
                                                                        <li style="text-align: justify;">Khandaker
                                                                            Shahidul Islam and Shamim Ripon,
                                                                            <strong>An Algorithm of Determining
                                                                                Convex-Hull of a Finite Set of two
                                                                                Dimensional Points Using the
                                                                                Combination of Approximation and
                                                                                Interior Elimination
                                                                                Methods</strong>, <em>Proc.
                                                                                International Conference on
                                                                                Robotics, Vision and Parallel
                                                                                Processing for Automation,
                                                                                ROVPIA’99</em>, July 1999, Malaysia,
                                                                            pp 491-496.</li>
                                                                    </ol>
                                                                </div>
                                                                <!--                                                <div class="col-md-12 text-center">No notice found</div>-->
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <!--                                            <div class="tab-pane active" id="tab-9">-->
                                                            <div class="tab-pane " id="tab-3">
                                                                <div class="desc">
                                                                    <ol>
                                                                        <li>Mir Moynuddin Ahmed Shibly, Tahmina
                                                                            Akter Tisha, Tanzina Akter Tani and
                                                                            Shamim H Ripon, <strong>Convolutional
                                                                                Neural Network-based Ensemble
                                                                                Methods to Recognize Bangla
                                                                                Handwritten Character</strong>,
                                                                            <em>PeerJ Computer Science 7:e565</em>,
                                                                            https://doi.org/10.7717/peerj-cs.565.
                                                                            (IF. 3.67).</li>
                                                                        <li>Linkon Chowdhury, Md Sarwar Kamal,
                                                                            Shamim H. Ripon, Sazia Parvin, Omar
                                                                            Khadeer Hussain, Amira Ashour and Bristy
                                                                            Roy Chowdhury, <strong>A Biological
                                                                                Data-Driven Mining Technique by
                                                                                Using Hybrid Classifiers With Rough
                                                                                Set</strong>, <em>International
                                                                                Journal of Ambient Computing and
                                                                                Intelligence (IJACI)</em>, vol.12,
                                                                            no.3 2021: pp.123-139.
                                                                            http://doi.org/10.4018/IJACI.2021070106.
                                                                        </li>
                                                                        <li>Tahmina Akter Tisha, Mir Moynuddin Ahmed
                                                                            Shibly, Kowshik Ahmed, and Shamim H
                                                                            Ripon, <strong>Convolutional Neural
                                                                                Networks and Ensemble Methods in
                                                                                Breast Cancer Prognosis</strong>,
                                                                            Chapter in Book <em>Computational
                                                                                Intelligence in Cancer Diagnosis:
                                                                                Progress and Challenges</em>,
                                                                            Elsevier (In press)</li>
                                                                        <li>Md Alauddin Rezvi, Sidratul Moontaha,
                                                                            Khadija Akter Trisha, Shamse Tasnim
                                                                            Cynthia, Shamim Ripon, <strong>Data
                                                                                Mining Approach to Analyzing
                                                                                Intrusion Detection of Wireless
                                                                                Sensor Network</strong>,
                                                                            <em>Indonesian Journal of Electrical
                                                                                Engineering and Computer
                                                                                Science</em>, Vol 21, No 1, January
                                                                            2021, pp. 516-523.</li>
                                                                        <li>Shamim Ripon, Fahim Sahariar Rasel,
                                                                            Ruhul Kabir Hawlader and Maheen Islam,
                                                                            <strong>Automated Requirements
                                                                                Extraction and Product Configuration
                                                                                Verification for Software Product
                                                                                Line</strong>. In: Jena, Ajay Kumar,
                                                                            Das, Himansu, Mohapatra, Durga Prasad
                                                                            (eds) <em>Automated Software Testing:
                                                                                Foundations, Applications, and
                                                                                Challenges</em>. Services and
                                                                            Business Process Reengineering,
                                                                            Springer, Singapore, 2020.</li>
                                                                        <li>Shamim Ripon, Md. Golam Sarowar, Fahima
                                                                            Qasim and Shamse Tasnim Cynthia,
                                                                            <strong>An Efficient Classification of
                                                                                Tuberous Sclerosis Disease Using
                                                                                PSO-based Optimized Machine Learning
                                                                                Techniques</strong>. In: Rout M.,
                                                                            Rout J., Das H. (eds) <em>Nature
                                                                                Inspired Computing for Data Science.
                                                                                Studies in Computational
                                                                                Intelligence, vol 871. Springer,
                                                                                Cham.&nbsp;</em>https://doi.org/10.1007/978-3-030-33820-6_1(2020)
                                                                        </li>
                                                                        <li>Md. Nuruddin Qaisar Bhuiyan, Md.
                                                                            Shamsujjoha, Shamim H. Ripon, Farhin
                                                                            Haque Proma, Fuad Khan, <strong>Transfer
                                                                                Learning and Supervised Classifier
                                                                                Based Prediction Model for Breast
                                                                                Cancer</strong>, Editor(s): Nilanjan
                                                                            Dey, Himansu Das, Bighnaraj Naik,
                                                                            Himansu Sekhar Behera, In
                                                                            Book<em>&nbsp;Advances in ubiquitous
                                                                                sensing applications for healthcare,
                                                                                Big Data Analytics for Intelligent
                                                                                Healthcare Management</em>, Chapter
                                                                            4, Pages 59-86, Academic Press, 2019, ,
                                                                            ISBN 9780128181461,
                                                                            https://doi.org/10.1016/B978-0-12-818146-1.00004-0.
                                                                        </li>
                                                                        <li style="text-align: justify;">Md. Golam
                                                                            Sarowar, Shamim H. Ripon, Md. Fahim
                                                                            Shahrier Rasel, <strong>A Mapreduce
                                                                                Approach to Analyzing Healthcare Big
                                                                                Data</strong>, in book <em>Medical
                                                                                Big Data and Internet of Medical
                                                                                Things: Advances, Challenges, and
                                                                                Applications</em>, Chapter 9, pp.
                                                                            217 – 243, CRC Press, 2019 .</li>
                                                                        <li>Arif -Ul-Islam, Shamim H Ripon and
                                                                            Nuruddin Qaisar Bhuiyan,
                                                                            <strong>Cervical Cancer Risk Factors:
                                                                                Classification and Mining
                                                                                Associations</strong>,<em>&nbsp;APTIKOM
                                                                                Journal on Computer Science and
                                                                                Information Technologies</em>, Vol.
                                                                            4, No. 1, 2019, pp. 8~18, ISSN:
                                                                            2528-2417, DOI:
                                                                            10.11591/APTIKOM.J.CSIT.131</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Linkon Chowdhury, Amira S.Ashour,
                                                                            Nilanjan Dey, <strong>Machine learning
                                                                                approach for Ribonucleic Acid
                                                                                primary and secondary structure
                                                                                prediction from images</strong>, in
                                                                            book <em>Soft Computing Based Medical
                                                                                Image Analysis,&nbsp;</em>Chapter
                                                                            12, pp 203 – 221,
                                                                            201<em>8,&nbsp;</em>Elsevier<em>.<br></em>
                                                                        </li>
                                                                        <li style="text-align: justify;">Md. Sarwar
                                                                            Kamal, Md. Golam Sarowar, Nilanjan Dey,
                                                                            Amira S. Ashour, Shamim Ripon, B.K.
                                                                            Panigrahi, João Manuel R.S. Tavares,
                                                                            <strong>Self-Organizing Mapping based
                                                                                Swarm Intelligence for Secondary and
                                                                                Tertiary Proteins
                                                                                Classification,</strong><em>International
                                                                                Journal of Machine Learning and
                                                                                Cybernetics&nbsp;</em>(Online First,
                                                                            30 Aug 2017) (SCI Index)<em>.</em></li>
                                                                        <li style="text-align: justify;">Md. Nawab
                                                                            Yousuf Ali, Md. Shamsujjoha, Golam
                                                                            Sorwar and Shamim H Ripon,
                                                                            <strong>Construction of Word Dictionary
                                                                                for Bangla Vowel Ended Roots and Its
                                                                                Verbal Inflexions in UNL Based
                                                                                Machine Translation Scheme</strong>,
                                                                            <em>Transactions on Machine Learning and
                                                                                Artificial Intelligence</em>
                                                                            (TMLAI), Vol. 5(1),DOI:
                                                                            10.14738/tmlai.51.2479.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Farhana Sultana and Fahmida
                                                                            Rahman, <strong>Verification of Service
                                                                                Composition and Compensation By
                                                                                Using Process Algebra</strong>,
                                                                            <em>Journal of Advances in Computer
                                                                                Networks</em> (JACN), vol. 4, no. 4,
                                                                            pp. 193-200, 2016. .</li>
                                                                        <li style="text-align: justify;">Sarwar
                                                                            Kamal, Nilanjan Dey, Amira S. Ashour,
                                                                            Shamim H Ripon and Valentina Emilia
                                                                            Balas, <strong>FbMapping: An Automated
                                                                                System for Monitoring Facebook
                                                                                Data</strong>, <em>Neural Network
                                                                                World</em>, Special Issue on Applied
                                                                            Soft Computing for Online Social
                                                                            Networks, Vol 27, pp. 27-57, 2017 (SCI
                                                                            Index).</li>
                                                                        <li style="text-align: justify;">Sarwar
                                                                            Kamal, Nilanjan Dey, Sonia Farhana
                                                                            Nimmy, Shamim H Ripon, Nawab Yousuf Ali,
                                                                            Amira Salah Ashour, Wahiba Ben
                                                                            Abdessalem Karaa and Fuqian Shi,
                                                                            <strong>Evolutionary Framework for
                                                                                Coding Area Selection from Cancer
                                                                                Data,&nbsp;</strong><em>Neural
                                                                                Computing and
                                                                                Applications</em><strong>,&nbsp;</strong>Special
                                                                            Issue on Applied Soft Computing for
                                                                            Online Social Networks, Vol 27, pp
                                                                            27-57, 2017, Springer (SCI Index).</li>
                                                                        <li style="text-align: justify;">Md.Sarwar
                                                                            Kamal, Shamim H Ripon, Nilanjan Dey,
                                                                            Amira S. Ashour, V. Santhi, <strong>A
                                                                                MapReduce Approach to Diminish
                                                                                Imbalance Parameters for Big
                                                                                Deoxyribonucleic Acid
                                                                                Dataset</strong>, <em>Computer
                                                                                Methods and Programs in
                                                                                Biomedicine</em>, vol. 131, pp.
                                                                            191-206, 2016, Elsevier&nbsp;(SCI Index)
                                                                            .</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Musfiqur Rahman, Javedul Ferdous
                                                                            and Md. Delwar Hossain,
                                                                            <strong>Verification of SPL Feature
                                                                                Model by Using Bayesian
                                                                                Network</strong>, <em>Indian Journal
                                                                                of Science and Technology</em>, Vol
                                                                            9(31), August 2016 (SCI Index).</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Md. Sarwar Kamal, Saddam Hossain
                                                                            and Nilanjan Dey, <strong>Theoretical
                                                                                Analysis of Different Classifiers
                                                                                under Reduction Rough Data Set: A
                                                                                Brief Proposal</strong>
                                                                            <em>International Journal of Rough Sets
                                                                                and Data Analysis (IJRSDA)</em>,
                                                                            Vol. 5(1) 2016, IGI Global.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain and Moshiur
                                                                            Mahamud Piash, <strong>Logic-Based
                                                                                Verification of Software Product
                                                                                Line Variant Requirement
                                                                                Model</strong>, <em>International
                                                                                Journal of Knowledge and Systems
                                                                                Science (IJKSS)</em>, vol. 5(4), pp.
                                                                            52-76, Feb 2015. IGI Global (ESCI Index)
                                                                        </li>
                                                                        <li style="text-align: justify;">Musfiqur
                                                                            Rahman and Shamim Ripon, <strong>Using
                                                                                Bayesian Networks to Model and
                                                                                Analyze Software Product Line
                                                                                Feature Model</strong>, in book
                                                                            <em>Multi-disciplinary Trends in
                                                                                Artificial Intelligence</em>, LNCS
                                                                            8875, pp. 220-231, 2014, Springer
                                                                            International Publishing,
                                                                            DOI:10.1007/978-3-319-13365-2_20.</li>
                                                                        <li style="text-align: justify;">Shamim H
                                                                            Ripon, Syed Fahin Ahmed, Afroza Yasmin,
                                                                            Yeaminar Rashid and K. M. Imtiaz-UD-Din,
                                                                            <strong>Formal Analysis of a Ranked
                                                                                Neighbour MANET Protocol
                                                                                Suite</strong>, <em>International
                                                                                Journal of Future Computer and
                                                                                Communication
                                                                                (IJFCC)&nbsp;</em>Vol.3(5), pp.
                                                                            325-330 ISSN: 2010-3751, DOI:
                                                                            10.7763/IJFCC.2014.V3.320</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain and Touhid
                                                                            Bhuiyan, <strong>Logic-Based Analysis of
                                                                                Product Line Variant Model</strong>,
                                                                            <em>ACEEE Int. J. of Recent Trends in
                                                                                Engineering &amp; Technology</em>,
                                                                            Vol. 11(2), pp. 541-550, June 2014.</li>
                                                                        <li style="text-align: justify;">K. M.
                                                                            Imtiaz-Ud-Din, Touhid Bhuiyan and Shamim
                                                                            Ripon, <strong>Circle of Trust – One Hop
                                                                                Trust Based Security Paradigm for
                                                                                Resource Constraint MANET</strong>,
                                                                            in book <em>Intelligent Computing,
                                                                                Networking, and Informatics</em>,
                                                                            Advances in Intelligent Systems and
                                                                            Computing, vol. 243, pp. 163-172, Durga
                                                                            Prasad Mohapatra, and Srikanta Patnaik,
                                                                            Eds, 2014, Springer India. doi:
                                                                            10.1007/978-81-322-1665-0_15</li>
                                                                        <li style="text-align: justify;">Sumaiya
                                                                            Kabir, Shamim Ripon, Mamunur Rahman and
                                                                            Tanjim Rahman, <strong>Knowledge-Based
                                                                                Data Mining Using Semantic
                                                                                Web</strong>, <em>IERI
                                                                                Procedia</em>, Vol. 7. pp. 113-119.
                                                                            (Elsevier) doi:
                                                                            10.1016/j.ieri.2014.08.018</li>
                                                                        <li style="text-align: justify;">Nakul C.
                                                                            Das, Shamim Ripon, Orin Hossain and
                                                                            Mohammad Salah Uddin,
                                                                            <strong>Requirement Analysis of Product
                                                                                Line Based Semantic Web
                                                                                Services</strong>, <em>Lecture Notes
                                                                                on Software Engineering (LNSE)</em>,
                                                                            Vol. 2(3): 210-217, 2014, ISSN:
                                                                            2301-3559, DOI: 10.7763/LNSE.2014.V2.125
                                                                        </li>
                                                                        <li style="text-align: justify;">Md. Salah
                                                                            Uddin, Shamim Ripon, Nakul C Das and
                                                                            Orin Hossain,<strong>&nbsp;A Comparative
                                                                                Study of Web Service Composition via
                                                                                BPEL and Petri Nets</strong>,
                                                                            <em>International Journal of Computer
                                                                                and Electrical Engineering
                                                                                (IJCEE)</em>, Vol.6 (2): 110-113,
                                                                            2014, ISSN: 1793-8163, IACSIT Press.
                                                                        </li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Moshiur Mahamud Piash, Sheikh Md.
                                                                            Alam Hossain and Md. Salah Uddin,
                                                                            <strong>Semantic Web Based Analysis of
                                                                                Product Line Variant Model</strong>,
                                                                            <em>International Journal of Computer
                                                                                and Electrical Engineering
                                                                                (IJCEE)</em>, Vol. 6, No. 1,
                                                                            February 2014, IACSIT Press, ISSN:
                                                                            1793-8163.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain and Touhid
                                                                            Bhuiyan <strong>Managing and Analysing
                                                                                Software Product Line
                                                                                Requirements</strong>,
                                                                            <em>International Journal of Software
                                                                                Engineering &amp; Applications
                                                                                (IJSEA)</em>, Ed. Sriman Narayana
                                                                            Iyengar, Vol. 4, No. 5, pp. 63-75, Sept
                                                                            2013, AIRCC.</li>
                                                                        <li style="text-align: justify;">Md. Nawab
                                                                            Yousuf Ali and Shamim Ripon, <strong>UNL
                                                                                Based Bangla Machine Translation
                                                                                Framework</strong>, Chapter 3 in
                                                                            book <em>Technical Challenges and Design
                                                                                Issues in Bangla Language
                                                                                Processing</em>, Ed. M. A. Karim, M.
                                                                            Kaykobad and M. Murshed, pp. 35-78,
                                                                            April 2013, IGI Global, DOI:
                                                                            10.4018/978-1-4666-3970-6.</li>
                                                                        <li style="text-align: justify;">Mijanur
                                                                            Rahman and Shamim Ripon,
                                                                            <strong>Elicitation and Modeling Non
                                                                                -Functional Requirements Functional
                                                                                Requirements – A POS Study
                                                                                Case</strong>, <em>International
                                                                                Journal of Future Computer and
                                                                                Communication IJFCC 2013&nbsp;</em>,
                                                                            Vol.2(5):485-489 ISSN: 2010-3751 .</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sk. Jahir Hossain, Keya Azad, and
                                                                            Mehidee Hassan, <strong>Formal Modeling
                                                                                of Product-Line Variant
                                                                                Requirements</strong>,
                                                                            <em>International Journal of Computer
                                                                                and Communication Engineering</em>,
                                                                            vol. 2, no. 1, pp. 71-74, 2013.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Sumaya Mahbub and K. M.
                                                                            Imtiaz-ud-Din, <strong>Verification of A
                                                                                Security Adaptive Protocol Suite
                                                                                Using SPIN</strong>,
                                                                            <em>International Journal of Engineering
                                                                                and Technology IJET 2013</em>,
                                                                            Vol.5(2): 254-256 ISSN: 1793-8236.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Moshiur Mahamud Piash and Sheikh
                                                                            Md. Alam Hossain, <strong>Modeling
                                                                                Product Line Variants – Semantic Web
                                                                                Approach</strong>, <em>International
                                                                                Journal of Lecture Notes on Software
                                                                                Engineering</em> LNSE 2013 Vol.1(1):
                                                                            84-88 ISSN:2301-3559.</li>
                                                                        <li style="text-align: justify;">Shaikh
                                                                            Muhammad Allayear, Sung Soon Park,
                                                                            Shamim H. Ripon and Gyeong Hun Kim
                                                                            <strong>Adaptation Mechanism of iSCSI
                                                                                Protocol for NAS Storage Solution in
                                                                                Wireless Environment</strong>, in
                                                                            book <em>Web-Age Information
                                                                                Management</em>, Lecture Notes in
                                                                            Computer Science, 7419, Chapter 12, pp.
                                                                            109-118, 2012, Springer Berlin
                                                                            Heidelberg.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Aoyan Barua and Mohammad Salah
                                                                            Uddin, <strong>Analysis Tool for
                                                                                UNL-Based Knowledge
                                                                                Representation</strong>, <em>Journal
                                                                                of Advanced Computer Science and
                                                                                Technology Research</em> Vol. 2 No.
                                                                            4, pp. 176-183, 2012.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, <strong>A Unified Tabular Method
                                                                                for Modeling Variants of Software
                                                                                Poduct Line</strong>, <em>ACM
                                                                                SIGSOFT Software Engineering
                                                                                Notes</em>, Vol. 37, Issue 3, May
                                                                            2012.</li>
                                                                        <li style="text-align: justify;">Md Nawab
                                                                            Yousuf Ali, Shamim Ripon and Shaikh
                                                                            Muhammad Allayear, <strong>UNL Based
                                                                                Bangla Natural Text Conversion:
                                                                                Predicate Preserving Parser
                                                                                Approach</strong>, <em>International
                                                                                Journal of Computer Science Issues
                                                                                (IJCSI)</em>, Volume 9, Issue 3, No.
                                                                            3, pp. 259-265, May 2012.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Alice Miller,
                                                                            <strong>Verification of a Symmetry
                                                                                Detection Technique using
                                                                                PVS</strong>, <em>Electronic
                                                                                Communications of the EASST</em>,
                                                                            Vol. 35.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, <strong>PVS Verification of cCSP
                                                                                Synchronous Semantics</strong>,
                                                                            <em>Engineering Letters</em>, Vol. 18
                                                                            No. 3, 2010.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, <strong>Process Algebraic Support
                                                                                for Web Service
                                                                                Composition</strong>, <em>ACM
                                                                                SIGSOFT Software Engineering
                                                                                Notes</em>, Vol. 35 (March), 2010.
                                                                        </li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Michael Butler,
                                                                            <strong>Deriving Relationship Between
                                                                                Semantic Models – An Approach for
                                                                                cCSP</strong>, <em>International
                                                                                Journal of Computer Science and
                                                                                Information Security</em>, Vol. 7
                                                                            No. 1, 2010, ISSN: 19475500.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon and Michael Butler, <strong>PVS
                                                                                Embedding of cCSP Semantic Models
                                                                                and their Relationship</strong>,
                                                                            <em>Electronic Notes in Theoretical
                                                                                Computer Science</em>, 250 (2009)
                                                                            103–118.</li>
                                                                        <li style="text-align: justify;">Michael
                                                                            Butler and Shamim Ripon,
                                                                            <strong>Executable Semantics for
                                                                                Compensating CSP</strong>, in book
                                                                            <em>Formal Techniques for Computer
                                                                                Systems and Business Processes</em>,
                                                                            Lecture Notes in Computer Science, 3670,
                                                                            pp. 243-256, 2005 Springer Berlin
                                                                            Heidelberg.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, Kamrul Hasan Talukder, and
                                                                            Khademul Islam Molla, <strong>Modelling
                                                                                Variability for System
                                                                                Families</strong>, <em>Malaysian
                                                                                Journal of Computer Science
                                                                                (MJCS)</em>, Vol. 16, No 1, June
                                                                            2003, pp. 37-46.</li>
                                                                        <li style="text-align: justify;">Shamim
                                                                            Ripon, <strong>Vectorization of
                                                                                Irregular Shaped Engineering Drawing
                                                                                to CAD Form</strong>, <em>Khulna
                                                                                University Studies</em>, Vol. 1, No.
                                                                            2, December 1999, pp. 143-147.</li>
                                                                    </ol>
                                                                </div>
                                                                <!--                                                <div class="col-md-12 text-center">No notice found</div>-->
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                ====================-->
                                                <!--                            </div>-->
                                                <!--                        </div>-->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne44">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#teaching_materials" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Teaching Materials
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="teaching_materials" class="panel-collapse collapse "
                                             role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <div>
                                                    <ul>
                                                        <li>

                                                            <h4><a class="oc-link-strong"
                                                                   href="https://sites.google.com/view/shamim-ripon/home"
                                                                   rel="noopener noreferrer" target="_blank">Google
                                                                    Site</a></h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne45">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#affiliation_professional_membership"
                                                   aria-expanded="false" aria-controls="collapseOne"
                                                   class="collapsed">
                                                    Affiliation Professional Membership
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="affiliation_professional_membership"
                                             class="panel-collapse collapse " role="tabpanel"
                                             aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <label style="color: lightslategray">no content</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne45">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu"
                                                   href="#galleryImage" aria-expanded="false"
                                                   aria-controls="collapseOne" class="collapsed">
                                                    Photo Gallery
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="galleryImage" class="panel-collapse collapse " role="tabpanel"
                                             aria-labelledby="headingOne" aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="image-container">
                                                    <div class="row ">
                                                        <div class="col-md-2">
                                                            <a href="" data-lightbox="gallaryImg">
                                                                <img src="images/about-bg-1.jpg"
                                                                     class="img-responsive img-rounded" alt=""
                                                                     title="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a href=""
                                                               data-lightbox="gallaryImg">
                                                                <img src="images/about-bg-1.jpg"
                                                                     class="img-responsive img-rounded" alt=""
                                                                     title="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion MenuEnd -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <!-- sidebar -->
                        <div class="col-lg-12 col-12 pd-10">
                            <div class="td-sidebar pd-10 bg-gray">
                                <div class="widget widget_catagory">
                                    <h4 class="widget-title">Department Name</h4>
                                    <ul class="catagory-items">
                                        <li><a href="faculty-members.html"><i class="fa fa-angle-right"></i>Faculty
                                                member</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Academic > Program</a></li>
                                        <li><a href="tution-fees.html"><i class="fa fa-angle-right"></i>Tution
                                                Fees</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Publications</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Officer</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Schollership</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Activities</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Awards & Honours</a></li>
                                        <!-- Awards & Honours> Research Award, Service Award, Teaching Award -->
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Annoucement</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Alumni</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Lab Facilities</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>News</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Gallery</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <!-- /.sidebar -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Facuty Member page end -->

@stop