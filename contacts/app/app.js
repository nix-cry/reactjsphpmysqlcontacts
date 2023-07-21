const ReactDOM = require("react-dom/client");
const React = require("react");




//const Data = require("./components/data.jsx");
const Contacts = require("./components/contacts.js");

apiparam = {
    domen:""
}


ReactDOM.createRoot(
    document.getElementById("app")
)
.render(
    <div>
        
        <Contacts  apiparams={apiparam} />
    </div>
);