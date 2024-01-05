<div class="modal fade" id="readModal" aria-hidden="true" aria-labelledby="readModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="readModalToggleLabel">View Employee Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="crud.php" method="POST">
                <div class="modal-body read_modal">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Record ID:</th>
                                <td class="w-80" id="read_recid"></td>
                            </tr>
                            <tr>
                                <th scope="row">Employee Fullname:</th>
                                <td class="w-auto" id="read_fullname"></td>
                            </tr>
                            <tr>
                                <th scope="row">Address:</th>
                                <td class="w-80" id="read_address"></td>
                            </tr>
                            <tr>
                                <th scope="row">Birthday:</th>
                                <td id="read_birthdate"></td>
                            </tr>
                            <tr>
                                <th scope="row">Age:</th>
                                <td id="read_age"></td>
                            </tr>
                            <tr>
                                <th scope="row">Gender:</th>
                                <td id="read_gender"></td>
                            </tr>
                            <tr>
                                <th scope="row">Civil Status:</th>
                                <td id="read_civilstat"></td>
                            </tr>
                            <tr>
                                <th scope="row">Contact Number:</th>
                                <td id="read_contactnum"></td>
                            </tr>
                            <tr>
                                <th scope="row">Salary:</th>
                                <td id="read_salary"></td>
                            </tr>
                            <tr>
                                <th scope="row">Status:</th>
                                <td id="read_isactive"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>