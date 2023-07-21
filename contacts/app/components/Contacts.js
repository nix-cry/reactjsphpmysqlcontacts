const React = require("react");
  
class Contacts extends React.Component {
    constructor(props){
        super(props);
        this.state = {
            data: [],
        };
        this.del = this.del.bind(this);
        this.add = this.add.bind(this);
    }

    async add(e){

        console.log(document.getElementById("inputname")); 
        console.log(document.getElementById("inputphone")); 

        const response = await fetch(this.props.apiparams.domen+"/contactsadd.php?name="+document.getElementById("inputname").value+"&phone="+ document.getElementById("inputphone").value);
        const json = await response.json();
            if(!json.error){
                this.setState({     
                    data: json.data ,
                });
            }

    }

    async del(e){

        console.log(e.currentTarget.getAttribute('dataname')); 
        console.log(e.currentTarget.getAttribute('dataphone')); 

        const response = await fetch(this.props.apiparams.domen+"/contactsdel.php?name="+e.currentTarget.getAttribute('dataname')+"&phone="+e.currentTarget.getAttribute('dataphone') );
        const json = await response.json();
            if(!json.error){
                this.setState({     
                    data: json.data ,
                });
            }
                    

    }


    componentDidMount(e) {
        //this.dataOne();
        fetch(this.props.apiparams.domen+"/contactsselect.php?all=all")
        .then(res => res.json())
            .then(
                (result) => {
                    //console.log(result.data);
                    this.setState({         
                        data: result.data ,
                    });
            },
            (error) => {
                this.setState({         
                    data: result.data ,
                });
            }
        )
    }


    render() {
       console.log(this.state.data);
        return  <div class="jam-contacts">
            <div class="jam-posc">
                <div class="jam-bord">

                    <div class="jam-add-contact">
                        <div class="jam-control">
                            <div class="jam-mod-header">
                                <div class="jam-header-contact">
                                    <span class="jam-header">
                                        Добавить контакт
                                    </span>
                                </div>
                            </div>
                            <div class="jam-input-contact">
                                <input class="jam-input" id="inputname" placeholder="Имя" type="text" />
                                <input class="jam-input" id="inputphone" placeholder="Телефон" type="phone" />
                            </div>
                            <div class="jam-button-contact">
                                <button onClick={this.add.bind(this)} class="jam-button">Добавить</button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="jam-contact">
                        <div class="jam-control">
                            <div class="jam-mod-header">
                                <div class="jam-header-contact">
                                    <span class="jam-header">
                                        Список контактов
                                    </span>
                                </div>
                            </div>
                            <div class="jam-input-search-contact">
                                <input class="jam-input" placeholder="Поиск" type="text" />
                                
                            </div>
                            <div class="jam-contact-ord">

                            {
                                this.state.data.map((item, id) => { 
                                    return <div class="jam-u-contact">
                                        <div class="jam-u-contact-see">
                                            <span class="jam-contact-header">
                                                    {item.name}
                                            </span>
                                            <span class="jam-contact-phone">
                                                    {item.phone}
                                            </span>
                                        </div>
                                        <div  onClick={this.del.bind(this)} dataname={item.name} dataphone={item.phone} class="jam-u-contact-del">
                                            <span  class="jam-contact-del">
                                                    X
                                            </span>

                                        </div>
                                    </div>
                                })
                            }
 
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> ;
    }
}
  
module.exports = Contacts;