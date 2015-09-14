<?php foreach ($list_gift_details as $details): ?>  
    <div class="row"> 
        <div class="col-md-3"> 
            <h2>KHÁCH HÀNG</h2>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home">  
                    <?php foreach ($list_user as $user): ?>
                        <?php if ($user->id == $details->userid): ?>
                            <div class="form-group">
                                <label style="font-weight: bold;">User:</label> 
                                <?php echo $user->uname; ?> 
                            </div> 
                            <div class="form-group">
                                <label style="font-weight: bold;">Email:</label> 
                                <?php echo $user->uemail; ?> 
                            </div> 
                            <div class="form-group">
                                <label style="font-weight: bold;">Phone:</label> 
                                <?php echo $user->uphone; ?> 
                            </div> 
                            <div class="form-group">
                                <label style="font-weight: bold;">Địa chỉ:</label> 
                                <?php echo $user->uaddress; ?> 
                            </div> 
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4"> 
            <h2>SẢN PHẨM ĐƠN HÀNG</h2>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home"> 
                    
                    <?php foreach ($list_product as $product): ?>
                        <?php if ($product->id == $details->product_id): ?>
                            <div class="form-group">
                                <label style="font-weight: bold;">ID sản phẩm:</label> 
                                <?php echo $product->id; ?> 
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;">Tên sản phẩm:</label> 
                                <?php echo $product->proname; ?> 
                            </div> 
                            <div class="form-group">
                                <label style="font-weight: bold;">Giá gốc:</label> 
                                <?php echo $product->mainprice; ?> 
                            </div> 
                            <div class="form-group">
                                <label style="font-weight: bold;">Giá khuyến mại:</label> 
                                <?php echo $product->secondprice; ?> 
                            </div> 
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <div class="col-md-5"> 
            <h2>THÔNG TIN ĐẶT HÀNG</h2>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="home"> 
 
                    <div class="form-group">
                        <label style="font-weight: bold;">Tên người gửi:</label> 
                        <?php echo $details->gift_namefrom; ?> 
                    </div> 
                    <div class="form-group">
                        <label style="font-weight: bold;">Loại hình sản phẩm:</label> 
                        <?php if ($details->gift_type == 1): ?>
                            Quà tặng cao cấp
                        <?php endif; ?>
                        <?php if ($details->gift_type == 2): ?>
                            Quà tặng khuyến mãi
                        <?php endif; ?>
                        <?php if ($details->gift_type == 3): ?>
                            Quà tặng VIP
                        <?php endif; ?>
                        <?php if ($details->gift_type == 4): ?>
                            Quà tặng sinh nhật
                        <?php endif; ?>
                        <?php if ($details->gift_type == 5): ?>
                            Quà tặng tân gia
                        <?php endif; ?>
                        <?php if ($details->gift_type == 6): ?>
                            Quà tặng khác
                        <?php endif; ?>
                        <?php if ($details->gift_type == 7): ?>
                            Đăng ký tặng quà
                        <?php endif; ?>
                            <?php if ($details->gift_type == 0): ?>
                            Mua hàng
                        <?php endif; ?>
                    </div> 
                    <div class="form-group">
                        <label style="font-weight: bold;">Ngày chuyển:</label> 
                        <?php echo $details->gift_date; ?> 
                    </div>
                     <div class="form-group">
                        <label style="font-weight: bold;">Tên người nhận:</label> 
                        <?php echo $details->gift_name; ?> 
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Ngày lập đơn hàng:</label> 
                        <?php echo $details->gift_create; ?> 
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Ghi chú đơn hàng:</label> 
                        <?php echo $details->gift_note; ?> 
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Điện thoại người nhận:</label> 
                        <?php echo $details->gift_phone; ?> 
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Địa chỉ người nhận:</label> 
                        <?php echo $details->gift_address; ?> 
                    </div>
                    
                </div> 
            </div>
        </div>


    </div> 
<?php endforeach; ?>