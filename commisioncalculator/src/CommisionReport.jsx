import React, { Component } from 'react';
import { Table, Button } from 'react-bootstrap';
import './App.css';

class CommisionReport extends Component {
  constructor(props) {
    super(props);
    this.state = {
      result: props.result,
      arrayJson: props.arrayJson
    }
    this.deleteEntryFromChild = this.deleteEntryFromChild.bind(this);
  }

  deleteEntryFromChild(newProductQuantity){
   		this.props.deleteEntry(newProductQuantity);
   }

  deleteItem(event) {
    let itemToRemove = event.target.value;
    let productQuantityJson = this.props.result;

    productQuantityJson.map((item, k) => {
        if (item.itemId === itemToRemove) {
          productQuantityJson.splice(k, 1);
        }

        this.setState({result: productQuantityJson});
        return productQuantityJson;
    });

    event.preventDefault();
    this.deleteEntryFromChild(itemToRemove);
  }

  render() {
    let result = null;
    let totalSalesAmount = 0;
    let totalCommisionGained = 0;

    if (this.props.result != null && this.props.result.length !== 0) {
      result = this.props.result;
    }

    if(result) {
      result.map((item, k) => {
        totalSalesAmount += item.itemSalesAmount;
        totalCommisionGained += item.itemCommisionGained;
      })

      return (
        <div className="Commision-report">
        <Table striped bordered condensed hover className="Commision-table">
          <thead>
           <tr>
             <th className="Commision-table-header">Items</th>
             <th className="Commision-table-header">Quantity</th>
             <th className="Commision-table-header">Sales amount (USD)</th>
             <th className="Commision-table-header">Commision gained (USD)</th>
             <th></th>
           </tr>
          </thead>
          <tbody>
          {result.map((item, k) => {
            return(
              <tr key={k}>
                <td className="Commision-table-td">{item.itemName}</td>
                <td className="Commision-table-td">{item.itemQuantity} {item.noun} ({item.itemQuantityUOM})</td>
                <td className="Commision-table-td">{item.itemSalesAmount}</td>
                <td className="Commision-table-td">{item.itemCommisionGained}</td>
                <td className="Commision-table-td">
                <Button
                  bsStyle="link"
                  value={item.itemId}
                  onClick={event => this.deleteItem(event)}
                  >delete
                </Button>
                </td>
              </tr>
            )
          })}
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Total</td>
            <td></td>
            <td>{totalSalesAmount}</td>
            <td>{totalCommisionGained}</td>
            <td></td>
          </tr>
          </tbody>
          </Table>

          <div>
          <Button
            bsStyle="link"
            value="all"
            onClick={event => this.deleteItem(event)}
            >Reset
          </Button>
          </div>
        </div>
      )
    } else {
      return (
        <div></div>
      )
    }
  }
}


export default CommisionReport;
