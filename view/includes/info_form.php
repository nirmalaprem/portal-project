<div class="row">
	<div class="col-lg-12">
		<div id="form-content" class="modal fade in" style="display: none; padding-left: 0px !important;">
			<div class="modal-header">
				<h3><b>Review Client</b> </h3>
				<div  id="lockmsgdisp" > </div>
			</div>

			<div class="modal-body">

				<form id="info_form" class="contact" name="info_form">
					<!-- BANKING -->
					<div class="row">
						<div class="col-lg-8">
							<div class="form_box_wrap">
								<div class="clearfix"></div>
								<input id="tag" type="hidden" name="tag" class="input-xlarge" />
								<div class="row form_box">

									<h4 class="modal-subheading"><b>Banking</b></h4>

									<div class="col-lg-4">
										<label class="label" for="emt">EMT</label>

										<input id="emt" type="text" name="emt" class="input-xlarge" />
									</div>
									<div class="col-lg-4">
										<label class="label" for="emt">EMT Password</label>
										<input id="emt_pass" type="text" name="emt_pass" class="input-xlarge" />
									</div>
									<div class="col-lg-4">
										<label class="label" for="source">Source</label>
										<div id="clientsource">
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="col-lg-4">
							<div class="form_box_wrap">

								<div class="form_box">
									<input id="emt_checkbox" type="checkbox"  data-width="100" data-height="50" unchecked data-toggle="toggle" data-on="READY" data-off="PENDING" data-onstyle="success" data-offstyle="warning">
									<select id="audit_emt" name="audit_emt"></select>
								</div>

							</div>
						</div>

					</div>

					<!-- INFO -->

					<div class="row">
						<div class="col-lg-8">
							<div class="form_box_wrap">

								<div class="row form_box">
									<h4 class="modal-subheading"><div style="padding-right:50px;"><b>Information</b> <font style="float:right;font-size:14px;"><b>Created Date :</b> <span id="createdDate" ></span> </font></div> </h4>

									<!--Personal-->
									<div class="col-lg-4">

										<label class="label" for="firstname">First Name</label>
										<input type="text" id="firstname" name="firstname" class="input-xlarge"/>

										<label class="label" for="lastname">Last Name</label>
										<input type="text" id="lastname" name="lastname" class="input-xlarge"/>

										<label class="label" for="email">Email</label>
										<input type="text" id="email" name="email" class="input-xlarge"/>

										<label class="label" for="phone">Phone</label>
										<input type="phone" id="phone" name="phone" class="input-xlarge"/>

										<label class="label" for="hphone">Home Phone</label>
										<input type="phone" id="hphone" name="hphone" class="input-xlarge"/>

										<label class="label" for="MMN">Mothers Maiden Name </label>
										<input id="mmn" name="MotherInfo"  type="text" maxlength="255" value="" class="input-xlarge" />

										<label class="label" for="secret">Password Code</label>
										<input id="secret" name="secret" type="text" maxlength="255" value="" class="input-xlarge"/>

										<label class="label" for="label:Occupation">Occupation </label>
										<!--<input id="occupation" name="occupation"  type="text" maxlength="255" class="input-xlarge"/> -->
										<select id="occupation" name="occupation" class="input-xlarge">
										<option value="0" >NONE</option>
										<?php echo file_get_contents('http://184.68.121.126/admin/controller/classes/getOccupationIDList.php'); ?>
									</select>

										<label class="label" for="Gender">Gender </label>
										<select id="gender" name="gender" class="input-xlarge">
											<option value="0" >UNKNOWN</option>
											<option value="M" >Male</option>
											<option value="F" >Female</option>
										</select>

										<label class="label" for="Date_of_Birth">Date of Birth (YYYY/MM/DD)</label>
										<div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
										<input name="dob" id="DOB" type="text"  required  />
										<span class="add-on"><i class="icon-th"></i></span>
                 		</div>


										<label class="label" for="agents">Agent</label>
										<input name="agent" id="agent" type="text" class="input-xlarge"  />
									</div>


									<div class="col-lg-4">
										<label class="label" for="lane">Address Line 1: </label>
										<input id="lane" name="lane" type="text" maxlength="255" value="" class="input-xlarge" required />
										<label class="label" for="laneTwo">Address Line 2: </label>
										<input id="laneTwo" name="laneTwo" type="text" maxlength="255" class="input-xlarge" />

										<label class="label" for="city">City: </label>
										<input id="city" name="city" type="text" maxlength="255" value="" class="input-xlarge" required />
										<label class="label" for="label:Province">Province: </label>
										<select id="province" name="province" class="input-xlarge" required>
											<option value="0" >NONE</option>
											<option value="AB" >Alberta</option>
											<option value="BC" >British Columbia</option>
											<option value="SK" >Saskatchewan</option>
											<option value="MB" >Manitoba</option>
											<option value="ON" >Ontario</option>
											<option value="QC" >Quebec</option>
											<option value="NB" >New Brunswick</option>
											<option value="PE" >PEI</option>
											<option value="NS" >Nova Scotia</option>
											<option value="NL" >Newfoundland and Labrador</option>
											<option value="YT" >Yukon</option>
											<option value="NT" >Northwest Territories</option>
											<option value="NU" >Nunavut</option>
										</select>

										<label class="label" for="code">Postal Code</label>
										<input id="code" name="code"  type="text" maxlength="255" class="input-xlarge" value="" />
									</div>


									<div class="col-lg-4">
										<label class="label" for="">Primary ID Type </label>
										<select id="pid_type" class="input-xlarge" name="PrimaryIDType">
											<option value="0" >NONE</option>
											<?php echo file_get_contents('http://184.68.121.126/admin/controller/classes/getPrimaryIDList.php'); ?>
										</select>

										<label class="label" for="id_number">ID Number </label>
										<input id="pid_num" name="PrimaryIDNumber" type="text" maxlength="255"  value="" class="input-xlarge"/>

										<label class="label" for="id_place">Place of Issuance</label>
										<select id="pid_place" name="PrimaryPlaceOfIssue" class="input-xlarge" required>
											<option value="0" >NONE</option>
											<option value="AB" >Alberta</option>
											<option value="BC" >British Columbia</option>
											<option value="SK" >Saskatchewan</option>
											<option value="MB" >Manitoba</option>
											<option value="ON" >Ontario</option>
											<option value="QC" >Quebec</option>
											<option value="NB" >New Brunswick</option>
											<option value="PE" >PEI</option>
											<option value="NS" >Nova Scotia</option>
											<option value="NL" >Newfoundland and Labrador</option>
											<option value="YT" >Yukon</option>
											<option value="NT" >Northwest Territories</option>
											<option value="NU" >Nunavut</option>
										</select>

										<label class="label" for="PrimaryIDExpiryDate">Expiry Date (YYYY/MM/DD)</label>
										<input id="pid_expire" name="PrimaryIDExpiryDate" data-format="yyyy-mm-dd" type="text" class="input-xlarge" required />
										<label class="label" for="SecondaryIDType">Secondary ID Type </label>
										<select id="sid_type" name="SecondaryIDType">
											<option value="0" >NONE</option>
											<?php echo file_get_contents('http://184.68.121.126/admin/controller/classes/getSecondaryIDList.php'); ?>
										</select>

										<label class="label" for="id_number">ID Number </label>
										<input id="sid_num" name="SecondaryIDNumber" type="text" maxlength="255"  value="" class="input-xlarge"/>

										<label class="label" for="id_place">Place of Issuance</label>
										<select id="sid_place" name="SecondaryPlaceOfIssue" class="input-xlarge" required>
											<option value="0" >NONE</option>
											<option value="AB" >Alberta</option>
											<option value="BC" >British Columbia</option>
											<option value="SK" >Saskatchewan</option>
											<option value="MB" >Manitoba</option>
											<option value="ON" >Ontario</option>
											<option value="QC" >Quebec</option>
											<option value="NB" >New Brunswick</option>
											<option value="PE" >PEI</option>
											<option value="NS" >Nova Scotia</option>
											<option value="NL" >Newfoundland and Labrador</option>
											<option value="YT" >Yukon</option>
											<option value="NT" >Northwest Territories</option>
											<option value="NU" >Nunavut</option>
										</select>

										<label class="label" for="SecondaryIDExpiryDate">Expiry Date (YYYY/MM/DD)</label>
										<input id="sid_expire" name="SecondaryIDExpiryDate" data-format="yyyy-mm-dd" type="text" required class="input-xlarge" />
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="form_box_wrap">

								<div class="form_box">
									<input id="info_checkbox" type="checkbox"  data-width="100" data-height="50"  data-toggle="toggle" data-on="READY" data-off="PENDING" data-onstyle="success"  data-offstyle="warning">
									<select id="audit_info" name="audit_info">
										<option title="" value="0" selected>--INFO STATUS--</option>
									</select>
								</div>

							</div>

							<div class="form_box_wrap" id="cardInfo">
									<div class="form_box">
									<h4 class="modal-subheading"><b>Card Information</b></h4>
									<label class="label" for="created Date">created Date</label>
									<input name="cardcreatedate" id="cardcreatedate" type="text" class="input-xlarge" readonly="true"  />
									<label class="label" for="Print Date">Print Date</label>
									<input name="cardprintdate" id="cardprintdate" type="text" class="input-xlarge" readonly="true"  />
									<label class="label" for="Wallet Number">Wallet Number</label>
									<input name="walletnumber" id="walletnumber" type="text" class="input-xlarge" readonly="true"  />
									<label class="label" for="Card Number">Card Number</label>
									<input name="cardnumber" id="cardnumber" type="text" class="input-xlarge" readonly="true"  />
									<label class="label" for="Balance">Balance</label>
									<input name="curbalance" id="curbalance" type="text" class="input-xlarge" readonly="true" />
									<label class="label" for="Balance">Card Activation Status</label>
									<input name="cardactivatestatus" id="cardactivatestatus" type="text"  readonly="true" />
									</div>
							</div>

						</div>
					</div>

					<!-- CONTRACT-->
					<div class="row">
						<div class="col-lg-8">
							<div class="form_box_wrap">

								<div class="row form_box">
									<h4 class="modal-subheading"><b>Contract</b></h4>

									<!--Personal-->
									<div class="col-lg-4">
										<label class="label" for="lane">Agreement Document </label>
										<br />
										<span id="ccagreement"></span>

										<span id="ilockagreement"></span>

									</div>
									<div class="col-lg-4">
										<?php if($_SESSION['user']['username'] == 'admin'){ ?>
											<label class="label" for="lane">Hello Sign Document Upload</label>
											<select id="hs_document_type" name="hs_document_type" class="form-control" >
												<option value="0" >NONE</option>
												<option value="catcard" >CAT Card Agreement</option>
												<option value="identitylock" >Identity Lock Agreement</option>
											</select>
											<div style="position:relative;">
												<a class='btn btn-info' href='javascript:;'>
														Choose PDF Document...
														<input type="file" id="file" name="file" size="40" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'   onchange='$("#upload-file-info").html($(this).val());'>
												</a>
											</div>
											<br />
											<button type="button" id="upload_docfile" class="uploadfile btn btn-primary">Submit</button>
											<br />
											<div id="show_error"></div>
										<?php } ?>
									</div>

								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="form_box_wrap">
								<div class="form_box">
									<input id="contract_checkbox" type="checkbox"  data-width="100" data-height="50"  data-toggle="toggle" data-on="READY" data-off="PENDING" data-onstyle="success"  data-offstyle="warning">
									<select id="audit_contract" name="audit_contract">
										<option title="" value="0" selected>--INFO STATUS--</option>
									</select>
								</div>

							</div>
						</div>
					</div>
	</form>
					<!-- Lead Status-->
					<div class="row">
						<div class="col-lg-8">
							<div class="form_box_wrap">

								<div class="row form_box">
									<h4 class="modal-subheading"><b>Lead Status Information</b></h4>

									<!--Personal-->
									<div class="col-lg-4">
										<label class="label" for="id_place">Lead Status</label>
										<select id="leadstatus" name="leadstatus" class="input-xlarge" autocomplete="off">
											<option value="none" selected="selected" >Select an Option</option>
											<option value="1st Attempt" >1st Attempt</option>
											<option value="2nd Attempt" >2nd Attempt</option>
											<option value="3rd Attempt" >3rd Attempt</option>
											<option value="4th Attempt" >4th Attempt</option>
											<option value="5th Attempt" >5th Attempt</option>
											<option value="Bad Information" >Bad Information</option>
											<option value="Interested" >Interested</option>
											<option value="Very Interested" >Very Interested</option>
											<option value="Do Not Contact or Call" >Do Not Contact / Call </option>
											<option value="Not Interested" >Not Interested</option>
											<option value="Debug Error" >Debug Error</option>
										</select>
										<div id="leadText">	</div>
									</div>

									<div class="col-lg-4">
										<label class="label" for="id_place">Follow Up Date</label>
										<input type="text" name="followupdate" id="followupdate" class="form_datetime form-control" value="" readonly="true" />
										<input class="btn btn-info" type="button" name="followup" id="followup" value="Update" />
										<div id="follow_text">	</div>
									</div>
									<div class="col-lg-4" >
								  </div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">

						</div>
					</div>


				<div class="row">
					<div class="col-lg-12">
						<div class="form_box_wrap">
							<form id="comment_form">
								<div class="row form_box">
									<h4 class="modal-subheading"><b>Comments</b></h4>
									<div style="padding:10px;">
									<div class="col-lg-8">
										<textarea class="form-control" rows="5" id="info_comment" name="info_comment" > </textarea>
										<div class="clearfix"><p></p></div>
										<br />
										<input class="submit_comment btn btn-warning" type="button" value="Add Comment" id="add_comment">

									</div>
									<!-- <div class="col-lg-8" id="comments_side"> -->

									<!-- </div> -->
										<div class="clearfix"></div>
										<div style="height:700px;overflow-y:auto;padding:5px;"  id="comments_area"></div>
									</div>


								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<div class="modal-footer">
				<input class="submit_info btn btn-success" type="submit" value="UPDATE" id="submit">
				<a href="#" class="exit btn btn-primary" data-dismiss="modal">Exit</a>
				<a href="#" class="lockedbtn" data-dismiss="modal" style="display:none;"></a>
			</div>

		</div>

	</div>
</div>
</div>
