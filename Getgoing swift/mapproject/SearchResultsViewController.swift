//
//  SearchResultsViewController.swift
//  mapproject
//
//  Created by Jinal on 2018-03-10.
//  Copyright © 2018 Jinal. All rights reserved.
//

import UIKit
import CoreData

class SearchResultsViewController: UIViewController, UITableViewDelegate, UITableViewDataSource {
    
   var rating: Double? = 0.0
    @IBOutlet weak var tableView: UITableView!
    

    @IBOutlet weak var sortbynamebutton: UIButton!
    
    @IBOutlet weak var sortbyratingbutton: UIButton!
    // var ManagedobjectContext:  NSManagedObjectContext!
    var places:[PlaceOfInterest]!
   // let PlaceOfInterest = PlaceOfInterest(context: context)
    var managedObjectContext: NSManagedObjectContext!
    override func viewDidLoad() {
        super.viewDidLoad()
        navigationItem.title="Search Results"
        let nib = UINib(nibName: "PlaceTableViewCell", bundle: nil)
        tableView.register(nib, forCellReuseIdentifier: "cellReuseIdentifier")
        
        tableView.estimatedRowHeight = 400
        tableView.rowHeight = UITableViewAutomaticDimension
        tableView.delegate = self
        tableView.dataSource = self
        let tapGesture = UITapGestureRecognizer(target: self, action: #selector(sortbyname(_:)))
        tapGesture.numberOfTapsRequired = 1
        sortbynamebutton.addGestureRecognizer(tapGesture)
        let tapGesturerating = UITapGestureRecognizer(target: self, action: #selector(sortbyrating(_:)))
          tapGesturerating.numberOfTapsRequired = 1
          sortbyratingbutton.addGestureRecognizer(tapGesturerating)

        
    }
    func numberOfSections(in tableView: UITableView) -> Int {
        return 1
    }
    
   // @IBAction func sortbyrating(_ sender: UIButton) {
      //  places.sort(by: {$0.rating ?? 0.0 > $1.rating ?? 0.0})
       // tableView.reloadData()
    //}
    
    @objc func sortbyname(_ sender: UIGestureRecognizer){
        print("button tapped")
        places.sort(by: {$0.name < $1.name})
        tableView.reloadData()
    }
    @objc func sortbyrating(_ sender: UIGestureRecognizer){
        print("ratingbutton tapped")
        places.sort(by: {$0.rating ?? 0.0 > $1.rating ?? 0.0})
        tableView.reloadData()
    }
    
    func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell{
        let cell = tableView.dequeueReusableCell(withIdentifier: "cellReuseIdentifier") as! PlaceTableViewCell
        cell.placeName.text = places![indexPath.row].name
    cell.vicinity.text = places![indexPath.row].vicnity ?? places![indexPath.row].formattedAddress
        cell.categories.text = places![indexPath.row].categories
        if let url = places[indexPath.row].icon, let data = try? Data(contentsOf: url),
            let img = UIImage(data: data) {
            let aspectRatio = img.size.height / img.size.width
          cell.upDateAspectRatioConstraint(aspectRatio: aspectRatio)
            cell.iconImageView.image = img
          
        }
        if let rating = places[indexPath.row].rating{
            cell.ratingControl.rating = Int(rating.rounded(.down))
           
        }
        return cell
        
    }
    
    func tableView(_ tableView: UITableView, didSelectRowAt indexPath: IndexPath) {
        if let detailsViewController = UIStoryboard(name: "Main", bundle: nil).instantiateViewController(withIdentifier: "DetailsViewController") as? DetailsViewController {
            detailsViewController.place = places![indexPath.row]
            self.navigationController?.pushViewController(detailsViewController, animated: true)
        }
    }
    
    func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int{
        return places!.count
    }
    
    func tableView(_ tableView: UITableView, heightForRowAt indexPath: IndexPath) -> CGFloat {
        return UITableViewAutomaticDimension
    }
    
}

