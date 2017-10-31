<div class="panel-default" style="margin-top: 40px;">
        <div class="panel-heading">
            <h4>Edit form</h4>
        </div>
        <div class="panel-body">
            <form method="POST" action="/edit-house/{{$house->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-sm-3">
                    <label for="housename">House Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="House Name"
                           name="housename"
                           value="{{ $house-> houseName }}" 
                           >
                </div>
                <div class="form-group col-sm-3">
                    <label for="address">Address</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Address"
                           name="address"
                           value="{{ $house-> houseAddress }}" 
                           >
                </div>
                <div class="form-group col-sm-3">
                    <label for="price">Price</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Price"
                           name="price"
                           value="{{ $house-> housePrice }}" 
                           >
                </div>
                <div class="form-group col-sm-3">
                    <label for="property-type">Property For:</label>
                    <select class="form-control"
                            name="for"
                            >
                            <option value="Sell">Sell</option>
                            <option value="Rent">Rent</option>
                    </select>
                </div>
                <div class="form-group col-md-12" style="position:relative;margin-left:5px;">
                    <a class='btn btn-info' href='javascript:;'>
                        Choose File...
                        <input type="file" name="houseImage" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="houseImage" size="40"  onchange='$("#upload-file-info").html($(this).val());' >
                    </a>
                    &nbsp;
                    <span class='label label-danger' id="upload-file-info"></span>
                </div>
                <div class="form-group col-sm-6">
                    <label for="description">Description:</label>
                    <textarea name="description" 
                            id="description" 
                            class="form-control"
                            name="description"
                            ></textarea>
                </div>
                <div class="form-group col-sm-2">
                    <label for="beds">Beds:</label>
                    <input type="text"
                        class="form-control highlight"
                        placeholder="Bedrooms"
                        name="bedrooms"
                        value="{{ $house-> houseBedrooms }}" 
                        >
                </div>
                <div class="form-group col-sm-2">
                    <label for="baths">Baths:</label>
                    <input type="text"
                        class="form-control highlight"
                        placeholder="Bathrooms"
                        name="bathrooms"
                        value="{{ $house-> houseBathrooms }}" 
                        >
                </div>
                <div class="form-group col-sm-2">
                    <label for="sqft">Sqft:</label>
                    <input type="text"
                        class="form-control"
                        placeholder="Sqft"
                        name="area"
                        value="{{ $house-> houseArea }}" 
                        >
                </div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-primary listing-button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>