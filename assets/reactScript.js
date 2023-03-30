class Header extends React.Component {
    render() {
        return (<header><h1><a href="index.php">Rainy Bookstore</a></h1></header>);
    }
}

class UserDetails extends React.Component {
    // a subcomponent of UserPage
    // displays user details
    render() {
        return (
            <div>
                <h2>Personal Details</h2>
                <p><strong>First Name:</strong> {this.props.firstName}</p>
                <p><strong>Last Name:</strong> {this.props.lastName}</p>
                <p><strong>Address:</strong> {this.props.address}</p>
                <p><strong>Email:</strong> {this.props.email}</p>
                <p><strong>Phone Number:</strong> {this.props.phone}</p>
            </div>
        );
    }
}

// Lab 11 addon
class UserPurchases extends React.Component {
    // a subcomponent of UserPage
    // displays user purchase history
    render() {
      const purchases = this.props.purchases.map((purchase, index) => (
        <li key={index}>
          {purchase[0]} - {purchase[1]}
        </li>
      ));
  
      return (
        <div>
          <h2>Purchase History</h2>
          <ul>{purchases}</ul>
        </div>
      );
    }
  }
  

class UserPage extends React.Component {
    // a wrapper component made up of header, user details, and user purchases subcomponents
    render() {
        return (
            <>
                <Header />
                <div className="container">
                    <UserDetails 
                        firstName={this.props.firstName} 
                        lastName={this.props.lastName} 
                        address={this.props.address}
                        email={this.props.email}
                        phone={this.props.phone}
                    />
                    <UserPurchases purchases={this.props.purchases} />
                 </div>
            </>
        );
    }
}

function doRender(element, target) {
    ReactDOM.render(element, document.getElementById(target));
}