import React from 'react';
import ReactDOM from 'react-dom';
import App from './layout/App';

require('./bootstrap');

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}

// if (document.getElementById('left-sidebar')) {
//     ReactDOM.render(<LeftSideBar />, document.getElementById('left-sidebar'));
// }
// if (document.getElementById('right-sidebar')) {
//     ReactDOM.render(<RightSideBar />, document.getElementById('right-sidebar'));
// }
// if (document.getElementById('content')) {
//     ReactDOM.render(<Content />, document.getElementById('content'));
// }
