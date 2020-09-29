import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import './app.scss';

function OW_Router() {

    return (
        <div className="app">
            <Router>
            <Switch>
                <Route path="/ow/home">
                    <h5> Vermont Est dans la place Home</h5>
                </Route>
                <Route path="/">
                    <h5> Vermont Est dans la place /</h5>
                </Route>
            </Switch>
            </Router>
        </div>
    );
}


ReactDOM.render(
   <OW_Router />,
    document.getElementById('ow_root')
);