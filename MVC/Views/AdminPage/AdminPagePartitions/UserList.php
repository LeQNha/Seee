
                <div class="nametable">
                    <h3><span class="list-row-number"><?= $data['Result']->num_rows; ?></span> người dùng</h3>
                </div>
                <table>
                  <tbody id="list-table-body">
                    <tr>
                        <th class="ordinal-number-column">#</th>
                        <th>Email</th>
                        <th>Tên tài khoản</th>
                        <!-- <th>Mật khẩu</th> -->
                        <th>Họ và tên</th>
                        <!-- <th>Tên</th> -->
                        <!-- <th>Nghề nghiệp</th>
                        <th>Vị trí</th> -->
                        <th>Giới thiệu</th>
                        <th></th>

                    </tr>

                      <?php
                        $rows = $data['Result'];
                        $count = 0;
                        foreach($rows as $row){ $count++ ?>

                        <tr id="<?= $row['username']; ?>">
                          
                          <td class="ordinal-number-column"><?= $count; ?></td>
                          <td class="user-email"><?= $row['email']; ?></td>
                          <td class="user-username"><?= $row['username']; ?></td>
                          <!-- <td class="user-password"><?= $row['password']; ?></td> -->
                          <td class="user-fullname"><?= $row['lastname'].' '.$row['firstname']; ; ?></td>
                          <td class="user-introduction"><?= $row['introduction']; ?></td>
                          
                          <td class="action">
                              <span><button class="edit-button" data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="GetUpdateUser('<?= $row['username']; ?>')"><i class="fa-solid fa-pen"></i> Sửa</button></span>
                              <span><button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete('<?= $row['username']; ?>')"><i class="fa-solid fa-trash"></i> Xóa</button></span>
                          </td>
                        </tr>

                        <?php } ?>
                      
                    </tbody>
                </table>