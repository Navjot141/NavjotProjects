//
//  LocationService.swift
//  mapproject
//
//  Created by Jinal on 2018-03-17.
//  Copyright © 2018 Jinal. All rights reserved.
//

import Foundation
import CoreLocation

protocol  LocationServiceDelegate: class {
    func tracingLocation(_ currentLocation: CLLocation)
    func tracingLocationDidFailWithError(_ error: Error)
}

class LocationService: NSObject,CLLocationManagerDelegate  {
    static let sharedInstance: LocationService = LocationService()
    var locationManager: CLLocationManager?
    var currentLocation: CLLocation?
    weak var delegate: LocationServiceDelegate?
    
    
    private override init() {
        super.init()
        self.locationManager = CLLocationManager()
        guard let locationManager = self.locationManager else{
            return
        }
        if CLLocationManager.authorizationStatus() == .notDetermined {
            locationManager.requestWhenInUseAuthorization()
        }
         locationManager.desiredAccuracy = kCLLocationAccuracyHundredMeters
        locationManager.delegate = self
    }
    func startUpdatingLocation(){
        print("Start Location Updates")
        self.locationManager?.startUpdatingLocation()
    }
    func stopUpdatingLocation(){
        print("Stop Location Updates")
        self.locationManager?.stopUpdatingLocation()
    }
    func locationManager(_ manager: CLLocationManager, didUpdateLocations locations: [CLLocation]) {
        guard let location = locations.last else {
            return
        }
        self.currentLocation = location
        updateLocation(location)
    }
    
    func  locationManager(_ manager: CLLocationManager, didFailWithError error: Error) {
        updateLocationDidFailWithError(error)
    }
    private func updateLocation(_ currentLocation: CLLocation){
        delegate?.tracingLocation(currentLocation)
        
    }
    private func updateLocationDidFailWithError(_ error: Error){
 delegate?.tracingLocationDidFailWithError(error)
        
    }
    
}
