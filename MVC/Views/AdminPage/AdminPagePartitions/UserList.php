
                <div class="nametable">
                    <h3>Danh sách người dùng</h3>
                </div>
                <table>
                  <tbody id="list-table-body">
                    <tr>
                        <th class="ordinal-number-column">#</th>
                        <th>Email</th>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Họ và tên</th>
                        <!-- <th>Tên</th> -->
                        <!-- <th>Nghề nghiệp</th>
                        <th>Vị trí</th>
                        <th>Giới thiệu</th> -->
                        <th></th>

                    </tr>

                      <?php
                        $rows = $data['Result'];
                        $count = 0;
                        foreach($rows as $row){ $count++ ?>

                        <tr id="<?= $row['username']; ?>">
                          
                          <td class="ordinal-number-column"><?= $count; ?></td>
                          <td><?= $row['email']; ?></td>
                          <td><?= $row['username']; ?></td>
                          <td><?= $row['password']; ?></td>
                          <td><?= $row['lastname'].' '.$row['firstname']; ; ?></td>

                          
                          <td class="action">
                              <button class="edit-button"><i class="fa-solid fa-pen"></i> Sửa</button>
                              <button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete('<?= $row['username']; ?>')"><i class="fa-solid fa-trash"></i> Xóa</button>
                          </td>
                        </tr>

                        <?php } ?>
                      
                    </tbody>
                </table>