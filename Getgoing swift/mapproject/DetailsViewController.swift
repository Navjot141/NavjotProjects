//
//  DetailsViewController.swift
//  mapproject
//
//  Created by Jinal on 2018-03-17.
//  Copyright © 2018 Jinal. All rights reserved.
//

import UIKit
import  MapKit

class DetailsViewController: UIViewController,MKMapViewDelegate {
    
    @IBOutlet weak var photoImageView: UIImageView!
    
    
    @IBOutlet weak var mapView: MKMapView!
    @IBOutlet weak var addressLabel: UILabel!
    
    @IBOutlet weak var PhoneLabel: UILabel!
    @IBOutlet weak var websiteLabel: UILabel!
    var place: PlaceOfInterest!
    
    var places: [PlaceOfInterest]!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        updateImageView()
        updateplace()
        //addressLabel.text = place.formattedAddress
        
        navigationItem.title = place.name
        setMapViewCoordinate()
    }
    
    func setMapViewCoordinate(){
        
        mapView.delegate = self
        
        if let coordinate = place.location?.coordinate{
            let annotation = MKPointAnnotation()
            annotation.title = place?.name
            annotation.coordinate = coordinate
            mapView.addAnnotation(annotation)
            
            centerMapOnLocation(annotation.coordinate)
            mapView.showsUserLocation = true
        }
    }
    
    func centerMapOnLocation(_ location: CLLocationCoordinate2D){
        let radius = Constants.radius
        let region = MKCoordinateRegionMakeWithDistance(location, CLLocationDistance(Double(radius ) * 2.0), CLLocationDistance(Double(radius) * 2.0))
        
        mapView.setRegion(region, animated: true)
    }
    
    func mapView(_ mapView: MKMapView, viewFor annotation: MKAnnotation) -> MKAnnotationView? {
        if annotation.isKind(of: MKUserLocation.self){
            return nil
        }
        let view = MKPinAnnotationView(annotation: annotation, reuseIdentifier: "reusePin")
        
        view.canShowCallout = true
        view.rightCalloutAccessoryView = UIButton(type: .detailDisclosure) as UIView
        view.pinTintColor = UIColor.green
        return view
    }
    func mapView(_ mapView: MKMapView, annotationView view: MKAnnotationView, calloutAccessoryControlTapped control: UIControl){
        print("tapped Info button")
        let location = view.annotation
        let launchingOptions = [MKLaunchOptionsDirectionsModeKey: MKLaunchOptionsDirectionsModeDriving]
        if let coordinate = view.annotation?.coordinate {
            location?.mapItem(coordinate:coordinate).openInMaps(launchOptions: launchingOptions)
        }
    }
    func updateImageView(){
        if let photoReference = place.photoReference, let maxWidth = place.maxWidth {
            GooglePlacesAPI.requestPhoto(photoreference: photoReference, maxWidth: maxWidth, completion: { (status, image) in
                DispatchQueue.main.async {
                    if let img = image {
                        _ = img.size.height / img.size.width
                        // self.aspectRatioLayoutConstraint.constant = 1 / aspectRatio
                    }
                    self.photoImageView.image = image
                }
            })
        }
    }
    func updateplace(){
        if let placedata = place.place_id {
            GooglePlacesAPI.requestplacedetail(placeId: placedata, completion: { (status, error, json) in
                if json != nil{
                if let result = json!["result"] as? [String: Any] {
                    if let formattedaddress = result["formatted_address"] as? String {
                        self.place.formattedAddress = formattedaddress
                    }
                    if let formattedphonenumber = result["formatted_phone_number"] as? String {
                        self.place.formattedphonenumber = formattedphonenumber
                    }
                    if let website = result["website"] as? String {
                        self.place.Website = website
                    }
                
                DispatchQueue.main.async {
                    self.addressLabel.text = self.place.formattedAddress
                    self.PhoneLabel.text = self.place.formattedphonenumber
                    self.websiteLabel.text = self.place.Website
                }
                }
                }
              })
        }
      }
    func showlabels()
    {
        
        PhoneLabel.text = place.formattedphonenumber
        
    }
    
}


extension MKAnnotation{
    func mapItem(coordinate: CLLocationCoordinate2D) -> MKMapItem{
        let placeMark = MKPlacemark(coordinate: coordinate)
        let mapItem = MKMapItem(placemark: placeMark)
        return mapItem
    }
}

