const accessAttempts = [
  {
    id: 99,
    time: "202x-02-13 17:52:12",
    chipId: 3,
    chipOwner: "Schmidt",
    door: "Eingang Lager",
    result: false,
  },
  {
    id: 100,
    time: "202x-02-13 17:52:25",
    chipId: 3,
    chipOwner: "Schmidt",
    door: "Eingang Lager",
    result: false,
  },
  {
    id: 101,
    time: "202x-02-14 07:11:20",
    chipId: 1,
    chipOwner: "Nettmann",
    door: "Eingang Büro",
    result: true,
  },
];

const generateTableHead = (table, data) => {
  let thead = table.createTHead();
  let row = thead.insertRow();
  for (let key of data) {
    let th = document.createElement("th");
    let text = document.createTextNode(key);
    th.appendChild(text);
    row.appendChild(th);
  }
};

const generateTable = (table, data) => {
    for (let element of data) {
      let row = table.insertRow();
      for (key in element) {
        let cell = row.insertCell();
        let text = document.createTextNode(element[key]);
        cell.appendChild(text);
      }
    }
  }

let table = document.querySelector("table");
let data = Object.keys(accessAttempts[0]);
generateTable(table, accessAttempts);
generateTableHead(table, data);


