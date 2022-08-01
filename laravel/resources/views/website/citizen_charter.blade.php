@extends('website.index')
@section('website_main_section')

	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="col-lg-12 header_msg_section">
                <h3 class="header_msg_section_title">Citizen Charter</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <table>
                            <tr>
                                <td><a href="{{asset($citizen_charter->citizen_charter)}}">Download</a></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <iframe style="height: 972px; width:100%" src="{{asset($citizen_charter->citizen_charter)}}"></iframe>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop