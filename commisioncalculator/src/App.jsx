import React, { Component } from 'react';
import './App.css';
import { FormGroup, FormControl, Button, ControlLabel } from 'react-bootstrap';
import CommisionReport from './CommisionReport';
import ErrorMessage from './ErrorMessage';

const axios = require('axios');

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      quantity: '',
      product: 'businesscard',
      result: null,
      arrayJson: [],
      formError: false,
      formErrorMessage: "",
    };
    this.deleteEntry = this.deleteEntry.bind(this);
  }

  deleteEntry(itemToRemove) {
    if(itemToRemove === "all") {
      this.setState({arrayJson: []});
      this.setState({result: []});
      this.setState({
        formError: false,
        formErrorMessage: "",
        quantity: ''
      });
    } else {
      let origProductQuantity = this.state.arrayJson;
      origProductQuantity.map((item, k) => {
          if (item.name === itemToRemove) {
            origProductQuantity.splice(k, 1);
          }

          this.setState({arrayJson: origProductQuantity});
          this.setState({
            formError: false,
            formErrorMessage: "",
            quantity: ''
          });
          return origProductQuantity;
      });
    }
  }

  add() {
    let productQuantityJson = this.state.result || [];
    let arrayJson = this.state.arrayJson;
    let strippedLeadingZeroQuantity = parseInt(this.state.quantity, 10);

    // validation
    if(isNaN(strippedLeadingZeroQuantity) || strippedLeadingZeroQuantity < 1) {
      this.setState({
        formError: true,
        formErrorMessage: "Please enter a valid amount",
        quantity: ''
      });
      return;
    } else {
        let duplicateProduct = false;
        for (var i = 0; i < arrayJson.length; i++) {
          if (arrayJson[i].name === this.state.product) {
            duplicateProduct = true;
            break;
          }
        }

        if(duplicateProduct) {
          this.setState({
            formError: true,
            formErrorMessage: "Product already added.",
            quantity: ''
          });
          return;
        }
    }
    // end validation

    arrayJson.push({
      name: this.state.product,
      quantity: strippedLeadingZeroQuantity
    });

    let myJson = {}
    myJson.product = arrayJson;
    let postJson = []
    postJson.push(myJson);
    let postJsonString = JSON.stringify(postJson);
    this.setState({arrayJson: arrayJson});

    axios.post('/api/commision', {
      "productAndQuantity": postJsonString
    })
    .then((response) => {
      productQuantityJson = response.data;
      this.setState({result : productQuantityJson});

      this.setState({
        formError: false,
        formErrorMessage: "",
        quantity: ''
      })
    })
    .catch((error) => {
      console.log(error);
    });

  }

  render() {
    return (
      <div className="App">
        <div className="App-title">Commision Calculator</div>

        <div className="Product-quantity-entry">
          <FormGroup controlId="productSelection">
            <ControlLabel className="Product-title">Product:</ControlLabel>
            <FormControl className="Product-selection"
              componentClass="select"
              onChange={event => {this.setState({product: event.target.value})}}
            >
              <option value="businesscard">Business Card (200/box)</option>
              <option value="brochures">Brochures (1000/box)</option>
              <option value="yearbook">Year Book (50/box)</option>
              <option value="mug">Mug (Cup)</option>
            </FormControl>
          </FormGroup>

          <FormGroup controlId="quantitySold">
            <ControlLabel className="Quantity-title">Quantity:</ControlLabel>
            <FormControl className="Quantity-input"
              type="number"
              placeholder="Quantity Sold"
              value={this.state.quantity}
              onChange={event => {this.setState({quantity: event.target.value})}}
            />
            <Button className="Quantity-add" type="button" bsStyle="primary"
                onClick={() => this.add()}>
              Add
            </Button>
          </FormGroup>
        </div>

        <ErrorMessage
          formError = {this.state.formError}
          formErrorMessage = {this.state.formErrorMessage}
        />

        <CommisionReport
          result = {this.state.result}
          arrayJson = {this.arrayJson}
          deleteEntry = {this.deleteEntry}
        />
      </div>
    )
  }
}

export default App;
