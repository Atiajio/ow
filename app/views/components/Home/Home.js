import React, { Component } from 'react';
import './Home.css';

export default class Home extends Component {
    render() {
        return (
            <div className="home">
                <div className="logo_container">
                    <img src="http://localhost/ow/public/img/ow_logo.png" alt="OW Framework Logo"/>
                </div>

                <div className="demo_home_component">
                    This is the demo Home component
                </div>

                <div className="installation_ok">
                    Your installation is successful and ready to start !
                </div>

                <div className="important_links">
                    <div className="link"><span className="fa fa-globe"></span><a href=""> Official website  </a> </div>
                    <div className="link"><a href=""><span className="fa fa-github"></span> Github  </a> </div>
                    <div className="link"><a href=""><span className="fa fa-book"></span> Documentation  </a> </div>
                    <div className="link"><a href=""><span className="fa fa-eye"></span> Sample project  </a> </div>
                </div>
            </div>
        )
    }
}
