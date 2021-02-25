<div class="row justify-content-center">
    <div class="card z-depth-2 " style="width:500px;padding:10px">
        <div id="formContent">
            <p class="flow-text center" id="changeTableDay">Test</p>
            <div class="row">
                <div class="input-field col-md-7">
                    <input type="number" class="numberDays1">
                    <label style="margin-left:19px;pointer-events:none;">Enter Number Of Days</label>
                </div>
                <span class="btnGo1 btnGo disabled btn green lighten-2 waves-green waves-effect white-text">go
                </span>
            </div>
            <div class="row">
                
            </div>
            <div class="center">
                <span class="disabled btn green lighten-2 waves-green waves-effect white-text">Set now
                </span>
            </div>
        </div>
    </div>
</div> 
<script>
    $('.numberDays1').on('change', function() {
        $i = $(this).val();
        if($i >= 1){
            $('.btnGo1').removeClass('disabled');
        }else{
            $('.btnGo1').addClass('disabled');
        }
    });
</script>
