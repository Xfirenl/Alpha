import React from 'react';
import ReactDOM from 'react-dom';
import LeftSideBar from './layout/LeftSideBar';
import RightSideBar from './layout/RightSideBar';
import Content from './layout/Content';

require('./bootstrap');

if (document.getElementById('left-sidebar')) {
    ReactDOM.render(<LeftSideBar />, document.getElementById('left-sidebar'));
}
if (document.getElementById('right-sidebar')) {
    ReactDOM.render(<RightSideBar />, document.getElementById('right-sidebar'));
}
if (document.getElementById('content')) {
    ReactDOM.render(<Content />, document.getElementById('content'));
}
