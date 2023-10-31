
<link rel="stylesheet" href="Public/css/AdminPageCss/UserList.css">
                <div class="nametable">
                    <h3>Danh sách người dùng</h3>
                </div>
                <table >
                    <tr>
                        <th class="ordinal-number-column">#</th>
                        <th>Email</th>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Nghề nghiệp</th>
                        <th>Vị trí</th>
                        <th>Giới thiệu</th>
                        <th></th>

                    </tr>

                      <?php
                        $rows = $data['Result'];
                        $count = 0;
                        foreach($rows as $row){ $count++ ?>

                        <tr>
                          
                          <td class="ordinal-number-column"><? echo $count; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['username']; ?></td>
                          <td><?php echo $row['password']; ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['firstname']; ?></td>
                          <td><?php echo $row['ocupation']; ?></td>
                          <td><?php echo $row['location']; ?></td>
                          <td><?php echo $row['introduction']; ?></td>
                          <td class="action">
                              <button class="edit-button"><i class="fa-solid fa-pen"></i> Sửa</button>
                              <button class="delete-button"><i class="fa-solid fa-trash"></i> Xóa</button>
                          </td>
                        </tr>

                        <?php } ?>
                      
                      
                </table>