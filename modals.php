<div class="modal fade" id="session_close_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Close Session
                    (ID: 
                    <span id="closeSessionAddon" style="color: red;">jj</span>
                    )
                </h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                <input name="session_id" type="text" class="form-control" id="CloseSessionId" style="display: none;" >
                    <div class="form-group">
                        <label class="form-label">Amount Saved</label>

                        <div class="form-control-wrap center ">
                        <!-- List of accounts available in the system from db -->
                            <select class="form-select js-select2" name="account_id[]">
                                <option value="default_option">Select Account</option>
                                <?php 
                                    $jsonobj =  file_get_contents("https://api.destineyent.com/api/cash_account/listAllCashAccounts.php");

                                    $PHPAccountObj = json_decode($jsonobj);

                                    if ($PHPAccountObj->success == 0) {
                                        $accounts_error = $PHPAccountObj->message;
                                    } elseif ($PHPAccountObj->success == 1) {
                                        $accounts_data = $PHPAccountObj->accounts;
                                        for ($x = 0; $x < count($accounts_data); $x++) {
                                            echo '
                                                <option value="' . $accounts_data[$x]->account_id . '">' . $accounts_data[$x]->account_number . '</option>                               
                                            ';
                                        }
                                    }
                                ?>
                            </select> 

                            &nbsp;

                            <div class="form-control-wrap">
                                <input name="amount[]" type="text" class="form-control" id="amount" required>
                            </div>

                            &nbsp;
                            <a href="#" data-target="addProduct" class="toggle btn btn-primary btnAddAccount d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
                        </div>  
                    </div>

                    <div class="form-control-wrap newAccount_container">
                        <!-- New Account fields are being added here with JS -->

                    </div>

                    <br>

                    <div class="form-group">
                        <label class="form-label" for="full-name">Power Unit</label>
                        <div class="form-control-wrap">
                            <input name="closing_power_units" type="text" class="form-control" id="power-units" required>
                        </div>
                    </div>
                                                    
                    <div class="form-group">
                        <button type="submit" name="closeSessionSubmit" class="btn btn-lg btn-primary">CLOSE</button>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<!-- session_close_model @e -->