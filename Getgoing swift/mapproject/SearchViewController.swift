//
//  SearchViewController.swift
//  mapproject
//
//  Created by Jinal on 2018-03-10.
//  Copyright © 2018 Jinal. All rights reserved.
//

import UIKit
import  CoreLocation
class SearchViewController: UIViewController, UITextFieldDelegate {
    
    
    
    
    @IBOutlet weak var searchtextfield: UITextField!
    @IBOutlet weak var searchButton: UIButton!
    @IBOutlet weak var activityIndicator: UIActivityIndicatorView!
    @IBOutlet weak var segmentedcontrolSwitch: UISegmentedControl!
    
    var SearchParameter: String = ""
    var currentLocation: CLLocation?
    var fradius: Float?
    var fopenNow: Bool?
    var frank: RankBy?
    override func viewDidLoad() {
        super.viewDidLoad()
        searchtextfield.delegate = self
        activityIndicator.isHidden = true
        
        // Do any additional setup after loading the view.
        //searchButton.isEnabled = false
    }
    @IBAction func presentFilters(_ sender: UIButton) {
        let filtersViewController = UIStoryboard(name: "Main", bundle: nil).instantiateViewController(withIdentifier: "FiltersViewController") as! FiltersViewController
        filtersViewController.delegate = self
        self.present(filtersViewController, animated: true, completion: nil)
    }
    //Mark: - IBActions
    @IBAction func segmentControlValueChanged(_ sender: UISegmentedControl) {
        if sender.selectedSegmentIndex == 1 {
            LocationService.sharedInstance.startUpdatingLocation()
            LocationService.sharedInstance.delegate = self
        }
        
        
    }
    
    
    
    @IBAction func performapicall(_ sender: UIButton) {
        //print(SearchParameter)
        searchtextfield.resignFirstResponder()
        
        if segmentedcontrolSwitch.selectedSegmentIndex == 0 {
            startSpinner()
            if let filterradius = fradius, let filteropennow = fopenNow {
            GooglePlacesAPI.requestPlacs(query: SearchParameter, qradius: filterradius, qopennow: filteropennow, completion: { (status, errorMessage, json) in
                //print(json ?? "")
                if status == 200, let jsonResponse = json {
                    let placesOfInterest = GooglePlacesAPIParser.parseNearbySearchResults(jsonResponse)
                    self.presentSearchResults(placesOfInterest)
                    
                }
                self.stopSpinner()
                
            })
            }
        } else {
            if let coordinate = currentLocation?.coordinate, let filterradius = fradius, let filteropennow = fopenNow {
                GooglePlacesAPI.requestPlacs(coordinate: coordinate, keyword: SearchParameter, qradius: filterradius, qopennow: filteropennow, completion: {(status, errorMessage, json) in
                    if status == 200, let jsonResponse = json {
                    let placesOfInterest = GooglePlacesAPIParser.parseNearbySearchResults(jsonResponse)
                    self.presentSearchResults(placesOfInterest)
                }
            })
        }
    }
    }
    
    func presentSearchResults(_ places: [PlaceOfInterest]){
        
            let SearchResultsViewController = UIStoryboard(name: "Main", bundle: nil).instantiateViewController(withIdentifier: "SearchResultsViewController") as!
            SearchResultsViewController
            SearchResultsViewController.places = places
            if places.count > 0 {
                savePlacesToLocalStorage(places: places)
            }
        DispatchQueue.main.async { self.navigationController?.pushViewController(SearchResultsViewController, animated: true)
            
        }
    }
   
    
    
    //activity indicator
    func startSpinner(){
        activityIndicator.isHidden = false
        activityIndicator.startAnimating()
        self.searchButton.isEnabled = false
        
    }
    func stopSpinner(){
        DispatchQueue.main.async {
            self.activityIndicator.stopAnimating()
            self.activityIndicator.isHidden = true
            self.searchButton.isEnabled = true
        }
        
    }
    
    
    func textFieldDidEndEditing(_ textField: UITextField) {
        if textField == searchtextfield {
            if let searchParam = textField.text {
                SearchParameter = searchParam
            }
        }
    }
    
    func textFieldShouldReturn(_ textField: UITextField) -> Bool {
        if textField ==  searchtextfield{
            searchtextfield.resignFirstResponder()
            return true
        }
        return false
    }
    
    
    
     // MARK: - Navigation
     
     // In a storyboard-based application, you will often want to do a little preparation before navigation
     override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
     // Get the new view controller using segue.destinationViewController.
     // Pass the selected object to the new view controller.
        if segue.identifier == "ShowHistory"{
            let destinationViewController = segue.destination as! SearchResultsViewController
           let loadedPlaces = loadListsFromLocalStorage() ?? []
            destinationViewController.places = loadedPlaces
        }
     }
    func savePlacesToLocalStorage(places: [PlaceOfInterest]){
         let isSuccessfulSave = NSKeyedArchiver.archiveRootObject(places,toFile: Constants.ArchiveURL.path)
        
    }
    func loadListsFromLocalStorage() -> [PlaceOfInterest]? {
        return NSKeyedUnarchiver.unarchiveObject(withFile: Constants.ArchiveURL.path) as? [PlaceOfInterest]
    }
}
extension SearchViewController: LocationServiceDelegate{
    func tracingLocation(_ currentLocation: CLLocation){
        self.currentLocation = currentLocation
    }
    func tracingLocationDidFailWithError(_ error: Error){
        print(error.localizedDescription)
    }
    
}
extension SearchViewController: openfilter{
    
    func updateFilterValues(filterSettings: FilterinSettings) {
        print("Launch")
        self.fradius = filterSettings.radius
        self.fopenNow = filterSettings.openNow
        self.frank = filterSettings.rank
        
        
    }
    
}

