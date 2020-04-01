
<style>
    .notice{
        display: inline-block;
        background: #b9e3e3;
        padding: 0.5em 0.8em;
        font-weight: bold;
        color: #2f2fa2;
        margin-top: 1em;
    }
    #virtual_learning_banner{
        background-color:#e2f4f4;
        position:relative;
    }
    #virtual_learning_banner.hidden{
        display: none ;
    }
    #virtual_learning_banner h2{
        color: #28286a;
        line-height: 1.3;
    }
    #virtual_learning_banner strong{
        color: #28286a;
    }
    #virtual_learning_banner p{
        color:#393939;
    }
    #virtual_learning_banner li{
        margin-top:8px;
        line-height:1.2;
    }
    #close_button{
    cursor: pointer;
    position: absolute;
    height: 28px;
    width: 28px;
    right: auto;
    left: 8px;
    bottom: auto;
    top: 0px;
    padding: 4px;
    color: #28286a;
    font-size:26px;
    }
</style>

<div id ="virtual_learning_banner" class="section">
    <div id="close_button" aria-label="Close">&times;</div>
    <div class="inner">
        <div>
            <div class="grid1-2">
                <div class="notice">Notice:</div>
                <h2>Our Campus is Closed. <br>Our Learning Continues.</h2>
                <p>We are virtually learning at this time while our campus is under a government closure decree. Our learning continues, check the ARIS Virtual Learning Programme page (under construction) to know more about how students will remotely continue to study during this time.</p>
            </div>
            <div class="grid2-2">
                <p>For more information on our current school operation level and communication you can contact us, use the following channels:</p>
                <p>
                    
                    <ul>
                        <li><strong>Admissions:</strong> +233 54 392 9191 or click on <a href="https://apply.aris.edu.gh/">Enroll Now </a></li>
                        <li><strong>Employment:</strong> recruitment@aris.edu.gh  </li>
                        <li><strong>Finance Payments:</strong> studentaccounts@aris.edu.gh  </li>
                        <li><strong>IT Support:</strong> support@aris.edu.gh </li>
                        <li><strong>Early Childhood Center:</strong> emaatouk@aris.edu.gh </li>
                        <li><strong>Primary School:</strong> dsadek@aris.edu.gh </li>
                        <li><strong>Middle School & Secondary School:</strong> amukherjee@aris.edu.gh dtham@aris.edu.gh</p></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<script>
    // Hide the banner when the close button is hit
    var x = document.getElementById('close_button');
    var banner = document.getElementById('virtual_learning_banner');
    x.addEventListener("click", function(e){
        banner.classList.toggle('hidden');
    } );
</script>