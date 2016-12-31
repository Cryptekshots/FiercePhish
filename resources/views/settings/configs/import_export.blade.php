@extends('layouts.app', ['title' => 'Import/Export Configurations'])

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Application Configuration Settings</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Export</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" action="{{ action('SettingsController@post_export_data') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Export Data:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <button type="submit" name="export" class="btn btn-primary">Data Export</button>
                        </div>
                      </div>
                    <p>You can export the database here for importing into a new FirePhish instance</p>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Import</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{ action('SettingsController@post_import_data') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Attachment</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <label class="btn btn-primary" for="attachment">
                            <input type="file" id="attachment" name="attachment" style="display: none;" onchange="$('#upload-file-info').html($(this).val())">
                            Browse...
                          </label>
                          <span class="label label-info" id="upload-file-info"></span>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Import Configurations</button>
                        </div>
                    </div>
                    <p>You can import a previous FirePhish instance here.  It will overwrite the current data and configurations, so its suggested to only do this on a new FirePhish install.</p>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
<script type="text/javascript">
    /* global $ */
    function select_mail_settings()
    {
        $(".conditional_settings").css('display', 'none');
        $("#"+$("#MAIL_DRIVER").val()+"_settings").css('display', 'block');
    }

    $("#MAIL_DRIVER").change(select_mail_settings);
    
    $(document).ready(function() {
        select_mail_settings();
    });
</script>
@endsection