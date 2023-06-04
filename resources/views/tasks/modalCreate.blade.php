<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Add Contact</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form>
                <div class="modal-body">
                    <div class="row gx-8">
                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Name
                                </label>
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="userName" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    User Name
                                </label>
                                <input type="email" class="form-control" id="userName">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="email" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Email
                                </label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="phone" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Phone
                                </label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="role" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Role
                                </label>
                                <input type="text" class="form-control" id="role">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="status" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Status
                                </label>
                                <select class="form-select" id="status">
                                    <option selected hidden>Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                    <option value="3">Pending</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-24">
                                <label for="personelText" class="form-label">Personel Information Text</label>
                                <textarea id="personelText" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-24">
                                <label for="aboutText" class="form-label">About Text</label>
                                <textarea id="aboutText" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>

                    <button type="button" class="m-0 btn btn-primary w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
