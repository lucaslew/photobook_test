import React, { Component } from 'react';
import './App.css';

class ErrorMessage extends Component {
  render() {
      if(this.props.formError) {
        return (
          <div className="ErrorMessage">
            {this.props.formErrorMessage}
          </div>
        )
      } else {
        return (
          <div></div>
        )
      }

  }
}

export default ErrorMessage;
