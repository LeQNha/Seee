var xhr = new XMLHttpRequest();

document.getElementById('buuton').addEventListener('click',AddCategory);
function AddCategory(){
    console.log('có ấn');
    xhr.open('POST','/index.php?controller=CategoryPage&action=AddCategory');
    formData = new FormData(document.getElementById('add-category-form')); 
    xhr.onload = function(){
        if(xhr.status === 200){
            alert(xhr.responseText);
        }else{
            alert('Đã có lỗi xảy ra!');
        }
    }
    xhr.send(formData);

    window.location.href = "/index.php?controller=CategoryPage";
}