const Customer = require('../models/Customer')


const mongoose = require('mongoose')

exports.homepage = async (req, res) => {

  const messages = await req.flash("info");

  const locals = {
    title: "NodeJs",
    description: "Free NodeJs User Management System",
  };
  
//   try {
//     const customers=await Customer.find({}).limit(22)
//     res.render('index', {locals,messages,customers} )

//   } catch (error) {
//     console.log(error)
//   }
// };

let perPage = 8;
  let page = req.query.page || 1;

  try {
    const customers = await Customer.aggregate([{ $sort: { createdAt: -1 } }])
      .skip(perPage * page - perPage)
      .limit(perPage)
      .exec();
    // Count is deprecated. Use countDocuments({}) or estimatedDocumentCount()
    // const count = await Customer.count();
    const count = await Customer.countDocuments({});

    res.render("index", {
      locals,
      customers,
      current: page,
      pages: Math.ceil(count / perPage),
      messages,
    });
  } catch (error) {
    console.log(error);
  }
};

exports.addCustomer = async (req, res) => {

  const messages = await req.flash("info");

  const locals = {
    title: "Add New User",
    description: "Free NodeJs User Management System",
  };

  res.render('customer/add', locals)
};


exports.postCustomer = async (req, res) => {

  // console.log(req.body)

  const newCustomer = new Customer({
    firstName: req.body.firstName,
    lastName: req.body.lastName,
    Project:req.body.Project,
    details: req.body.details,
    tel: req.body.tel,
    email: req.body.email,
  });

  try {
    await Customer.create(newCustomer);
    await req.flash("info", "New User has been added.");

    res.redirect("/");
  } catch (error) {
    console.log(error);
  }

};

exports.view=async(req,res)=>{
  try {
    const customer = await Customer.findOne({ _id: req.params.id });

    const locals = {
      title: "View Customer Data",
      description: "Free NodeJs User Management System",
    };

    res.render("customer/view", {
      locals,
      customer,
    });
  } catch (error) {
    console.log(error);
  }
};


exports.edit = async (req, res) => {
  try {
    const customer = await Customer.findOne({ _id: req.params.id });

    const locals = {
      title: "Edit Customer Data",
      description: "Free NodeJs User Management System",
    };

    res.render("customer/edit", {
      locals,
      customer,
    });
  } catch (error) {
    console.log(error);
  }
};


exports.editPost = async (req, res) => {
  try {
    await Customer.findByIdAndUpdate(req.params.id, {
      firstName: req.body.firstName,
      lastName: req.body.lastName,
      tel: req.body.tel,
      email: req.body.email,
      updatedAt: Date.now(),
    });

    await req.flash("info", "Information has been Updated.");

    res.redirect("/");
  } catch (error) {
    console.log(error);
  }
};

exports.deleteCustomer = async (req, res) => {
  try {
    await Customer.deleteOne({ _id: req.params.id });
    res.redirect("/");
  } catch (error) {
    console.log(error);
  }
}


exports.viewProject = async (req, res) => {
  try {
    const customer = await Customer.findOne({ _id: req.params.id });

    const locals = {
      title: "View Project Data",
      description: "Free NodeJs User Management System",
    };

    res.render("customer/viewProject", {
      locals,
      customer,
    });
  } catch (error) {
    console.log(error);
    res.status(500).send("Internal Server Error");
  }
};
