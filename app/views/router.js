import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import Home from './components/Home';

import './app.scss';

function OW_Router() {

    return (
        <div className="app">
            <Router>
            <Switch>
                <Route path="/">
                    <Home />
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