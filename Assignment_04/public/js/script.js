function createData() {
    axios.post(`/store` , {
        name: document.getElementById('name').value,
        major: document.getElementById('major').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value
    })
    .then(response => {
        console.log(response.data);
        window.location.href = "/";
    })
    .catch(error => {
        console.log(error);
    });
}

function updateData(id) {
    axios.post(`/update/${id}` , {
        name: document.getElementById('name').value,
        major: document.getElementById('major').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value
    })
    .then(response => {
        console.log(response.data);
        window.location.href = "/";
    })
    .catch(error => {
        console.log(error);
    });
}

function deleteData(id , row) {
    axios.delete(`/destroy/${id}`)
        .then(response => {
        console.log("delete successfully");
        row.remove();
        })
        .catch(error => {
        console.log(error);
        });
}