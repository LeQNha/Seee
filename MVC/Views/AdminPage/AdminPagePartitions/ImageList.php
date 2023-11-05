
                <div class="nametable">
                    <h3>Danh sách ảnh</h3>
                </div>
                <table>
                    <tbody id="list-table-body">
                    <tr>
                        <th class="ordinal-number-column">#</th>
                        <th>Tên</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Ngày tải lên</th>
                        <th></th>
                    </tr>

                    <?php
                        $rows = $data['Result'];
                        $count = 0;
                        foreach($rows as $row){ 
                            $count++;
                            $pathParts = explode('.',$row['path']); 
                        ?>
                        
                        <tr id="<?= $pathParts[0]; ?>">

                            <td class="ordinal-number-column"><?= $count; ?></td>
                            <td><?= $row['path']; ?></td>
                            <td class="image-title"><?= $row['title']; ?></td>
                            <td class="image-description"><?= $row['description']; ?></td>
                            <td><?= $row['dateuploaded']; ?></td>


                            <td class="action">
                                <button class="edit-button" data-bs-toggle="modal" data-bs-target="#editImageModal" onclick="GetUpdateImage('<?= $row['path']; ?>')"><i class="fa-solid fa-pen"></i> Sửa</button>
                                <button class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="Delete('<?= $row['path']; ?>')"><i class="fa-solid fa-trash"></i> Xóa</button>
                            </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>