let search = document.getElementById('search');
search = document.addEventListener('keyup', filterValue);
let table = document.getElementById('hotel_table');
let filter = document.getElementById('filter');
console.log(filter.options);
console.log("Table :" + table);

function filterValue() {

    const rows = table.querySelectorAll('tr');
    let filterVal = document.getElementById('search').value.toUpperCase();

    for (let i = 0; i < rows.length; i++) {

        if (filter.value == 'hname') {
            if (rows[i + 1].children[1].innerText.toUpperCase().indexOf(filterVal) > -1) {
                rows[i + 1].style.display = '';
            } else {
                rows[i + 1].style.display = 'none';
            }
        }

        if (filter.value == 'hcity') {
            if (rows[i + 1].children[2].innerText.toUpperCase().indexOf(filterVal) > -1) {
                rows[i + 1].style.display = '';
            } else {
                rows[i + 1].style.display = 'none';
            }
        }
        console.log(rows[i + 1]);

    }

}